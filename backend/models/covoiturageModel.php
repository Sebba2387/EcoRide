<?php
class Covoiturage {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Ajouter un covoiturage
    public function addCovoiturage($utilisateur_id, $voiture_id, $date_depart, $heure_depart, $lieu_depart, $date_arrivee, $heure_arrivee, $lieu_arrivee, $nombre_places, $prix) {
        // Convertir la date et l'heure de départ en un timestamp pour comparaison
        $date_heure_depart = strtotime($date_depart . ' ' . $heure_depart);
        // Récupérer la date et l'heure actuelles
        $date_heure_actuelle = time();
        // Vérifier si la date de départ est dans le futur
        if ($date_heure_depart <= $date_heure_actuelle) {
            // Retourner false si la date de départ est antérieure à la date actuelle
            return false;
        }
        // Si la date est valide, procéder à l'insertion
        $query = "INSERT INTO covoiturage (utilisateur_id, voiture_id, date_depart, heure_depart, lieu_depart, date_arrivee, heure_arrivee, lieu_arrivee, nombre_places, prix) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        // Lier les paramètres
        $stmt->bind_param("iissssssii", $utilisateur_id, $voiture_id, $date_depart, $heure_depart, $lieu_depart, $date_arrivee, $heure_arrivee, $lieu_arrivee, $nombre_places, $prix);
        return $stmt->execute(); // Exécuter la requête
    }

    // Récupérer les covoiturages d'un utilisateur
    public function getCovoituragesByUtilisateurId($utilisateur_id) {
        $query = "SELECT * FROM covoiturage WHERE utilisateur_id = ? AND nombre_places > 0 ORDER BY date_depart DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $utilisateur_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $covoiturages = [];
        while ($row = $result->fetch_assoc()) {
            // Ajouter la date et l'heure actuelles pour comparer avec la date et l'heure du covoiturage
            $row['current_datetime'] = date("Y-m-d H:i:s");
            $covoiturages[] = $row;
        }
        return $covoiturages;
    }
    // Récupérer les covoiturages 
    public function getCovoiturageById($covoiturage_id) {
        $sql = "SELECT * FROM covoiturage WHERE covoiturage_id = ? AND nombre_places > 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $covoiturage_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function supprimerCovoiturage($covoiturage_id) {
        // Supprimer d'abord les réservations associées
        $sqlReservations = "DELETE FROM reservation WHERE covoiturage_id = ?";
        $stmtReservations = $this->conn->prepare($sqlReservations);
        $stmtReservations->bind_param("i", $covoiturage_id);
        $stmtReservations->execute();
        $stmtReservations->close();
    
        // Ensuite, supprimer le covoiturage
        $sqlCovoiturage = "DELETE FROM covoiturage WHERE covoiturage_id = ?";
        $stmtCovoiturage = $this->conn->prepare($sqlCovoiturage);
        $stmtCovoiturage->bind_param("i", $covoiturage_id);
        $stmtCovoiturage->execute();
        $stmtCovoiturage->close();
    }

    // Mettre à jour un covoiturage
    public function updateCovoiturage($covoiturage_id, $date_depart, $heure_depart, $lieu_depart, $date_arrivee, $heure_arrivee, $lieu_arrivee, $nombre_places, $prix) {
        $sql = "UPDATE covoiturage SET date_depart = ?, heure_depart = ?, lieu_depart = ?, date_arrivee = ?, heure_arrivee = ?, lieu_arrivee = ?, nombre_places = ?, prix = ? WHERE covoiturage_id = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Erreur de préparation de la requête : ' . $this->conn->error);
        }
        $stmt->bind_param("ssssssssi", $date_depart, $heure_depart, $lieu_depart, $date_arrivee, $heure_arrivee, $lieu_arrivee, $nombre_places, $prix, $covoiturage_id);
        if ($stmt->execute()) {
            return true;
        } else {
            die('Erreur lors de l\'exécution de la requête : ' . $stmt->error);
        }
    }
    // Filtrer les covoiturages dont les places disponible >= 0
    public static function getFilteredCovoiturages($filters, $utilisateur_id) {
        global $conn; // Utilisation de la connexion globale
    
        $sql = "SELECT c.*, v.energie, u.pseudo,
                   TIMESTAMPDIFF(HOUR, c.heure_depart, c.heure_arrivee) AS duree, 
                   (SELECT AVG(a.note) 
                    FROM avis a 
                    WHERE a.covoiturage_id IN 
                          (SELECT co.covoiturage_id FROM covoiturage co WHERE co.utilisateur_id = c.utilisateur_id) 
                          AND a.note > 0) AS note_moy
            FROM covoiturage c
            LEFT JOIN voiture v ON c.voiture_id = v.voiture_id
            LEFT JOIN utilisateur u ON c.utilisateur_id = u.utilisateur_id
            WHERE c.nombre_places > 0 
            AND c.utilisateur_id != $utilisateur_id";
    
        $conditions = [];

        if (!empty($filters['pseudo'])) {
            $pseudo = mysqli_real_escape_string($conn, $filters['pseudo']);
            $conditions[] = "u.pseudo LIKE '%$pseudo%'";
        }
    
        if (!empty($filters['lieu_depart'])) {
            $lieu_depart = mysqli_real_escape_string($conn, $filters['lieu_depart']);
            $conditions[] = "c.lieu_depart LIKE '%$lieu_depart%'";
        }
        if (!empty($filters['lieu_arrivee'])) {
            $lieu_arrivee = mysqli_real_escape_string($conn, $filters['lieu_arrivee']);
            $conditions[] = "c.lieu_arrivee LIKE '%$lieu_arrivee%'";
        }
        if (!empty($filters['date_depart'])) {
            $date_depart = mysqli_real_escape_string($conn, $filters['date_depart']);
            $conditions[] = "c.date_depart = '$date_depart'";
        }
        if (!empty($filters['nombre_places'])) {
            $nombre_places = intval($filters['nombre_places']);
            $conditions[] = "c.nombre_places >= $nombre_places";
        }
        if (!empty($filters['duree'])) {
            $duree = intval($filters['duree']);
            $conditions[] = "TIMESTAMPDIFF(HOUR, c.heure_depart, c.heure_arrivee) <= $duree";
        }
        if (!empty($filters['energie'])) {
            $energie = mysqli_real_escape_string($conn, $filters['energie']);
            $conditions[] = "v.energie LIKE '%$energie%'";
        }
        if (!empty($filters['note'])) {
            $note = floatval($filters['note']);
            $conditions[] = "(SELECT AVG(a.note) FROM avis a WHERE a.covoiturage_id = c.covoiturage_id AND a.note > 0) >= $note";
        }
        if (!empty($filters['prix'])) {
            $prix = floatval($filters['prix']);
            $conditions[] = "c.prix <= $prix";
        }
    
        if (!empty($conditions)) {
            $sql .= " AND " . implode(" AND ", $conditions);
        }
    
        $sql .= " ORDER BY c.date_depart DESC";
    
        $result = mysqli_query($conn, $sql);
    
        if (!$result) {
            die("Erreur SQL : " . mysqli_error($conn));
        }
    
        $covoiturages = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $covoiturages[] = $row;
        }
    
        return $covoiturages;
    }
}
    
?>