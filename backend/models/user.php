<?php
require_once __DIR__ . '/../database/db.php'; // Connexion à la base de données

class User {
    private $conn;
    // Inscription de l'utilisateur
    public function __construct($db) {
        $this->conn = $db;
    }
    public function registerUser($nom, $prenom, $email, $password, $pseudo) {
        // Hasher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Requête d'insertion (SANS utilisateur_id car AUTO_INCREMENT)
        $sql = "INSERT INTO utilisateur (nom, prenom, email, password, pseudo) VALUES (?, ?, ?, ?, ?)";
        // Préparation de la requête
        $stmt = $this->conn->prepare($sql);
        // Liaison des paramètres
        $stmt->bind_param("sssss", $nom, $prenom, $email, $hashed_password, $pseudo);
        // Exécution de la requête
        return $stmt->execute();
    }

    // Connexion de l'utilisateur
    public function loginUser($email, $password) {
        $query = "SELECT * FROM utilisateur WHERE email = ?";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    return $user; // Retourne les infos de l'utilisateur connecté
                }
            }
            $stmt->close();
        }
        return false; // Échec
    }

    // Méthode pour la déconnexion
    public function logout() {
        // Fermer la session en détruisant la session
        session_start();
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
    }

    // Récupérer les infos de l'utilisateur connecté
    public function getUserById($utilisateur_id) {
        $query = "SELECT nom, prenom, email, pseudo, telephone, adresse, date_naissance, password FROM utilisateur WHERE utilisateur_id = ?";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("i", $utilisateur_id); // "i" car c'est un entier (INT)
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                return $result->fetch_assoc();
            }
            $stmt->close();
        }
        return null; // Aucun utilisateur trouvé
    }

    // Modifier les infos de l'utilisateur à partir du dashboard
    public function updateUser($utilisateur_id, $nom, $prenom, $pseudo, $email, $telephone, $adresse, $date_naissance) {
        $query = "UPDATE utilisateur SET nom = ?, prenom = ?, pseudo = ?, email = ?, telephone = ?, adresse = ?, date_naissance = ? WHERE utilisateur_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssssi", $nom, $prenom, $pseudo, $email, $telephone, $adresse, $date_naissance, $utilisateur_id);

        return $stmt->execute();
    }

    // Modifier le mot de passe de l'utilisateur
    public function updatePassword($utilisateur_id, $nouveau_mdp) {
        $hashed_password = password_hash($nouveau_mdp, PASSWORD_DEFAULT);
        $query = "UPDATE utilisateur SET password = ? WHERE utilisateur_id = ?";
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param("si", $hashed_password, $utilisateur_id);
            return $stmt->execute();
        }
        return false;
    }

    // Récupérer les utilisateurs ayant role_id = 3
    public function getUtilisateursAvecRole3() {
        $query = "SELECT utilisateur_id, nom, prenom, email, pseudo FROM utilisateur WHERE role_id = 3";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Supprimer un utilisateur par son ID
    public function supprimerUtilisateur($utilisateur_id) {
        // Supprimer les réservations où l'utilisateur est passager
        $queryReservationsUser = "DELETE FROM reservation WHERE utilisateur_id = ?";
        $stmtReservationsUser = $this->conn->prepare($queryReservationsUser);
        $stmtReservationsUser->bind_param("i", $utilisateur_id);
        $stmtReservationsUser->execute();
        $stmtReservationsUser->close();
    
        // Supprimer les réservations des covoiturages créés par l'utilisateur
        $queryReservations = "DELETE FROM reservation WHERE covoiturage_id IN (SELECT covoiturage_id FROM covoiturage WHERE utilisateur_id = ?)";
        $stmtReservations = $this->conn->prepare($queryReservations);
        $stmtReservations->bind_param("i", $utilisateur_id);
        $stmtReservations->execute();
        $stmtReservations->close();
    
        // Supprimer les covoiturages de l'utilisateur
        $queryCovoiturages = "DELETE FROM covoiturage WHERE utilisateur_id = ?";
        $stmtCovoiturages = $this->conn->prepare($queryCovoiturages);
        $stmtCovoiturages->bind_param("i", $utilisateur_id);
        $stmtCovoiturages->execute();
        $stmtCovoiturages->close();
    
        // 4Supprimer les voitures de l'utilisateur
        $queryVoitures = "DELETE FROM voiture WHERE utilisateur_id = ?";
        $stmtVoitures = $this->conn->prepare($queryVoitures);
        $stmtVoitures->bind_param("i", $utilisateur_id);
        $stmtVoitures->execute();
        $stmtVoitures->close();
    
        // Supprimer l'utilisateur
        $queryUtilisateur = "DELETE FROM utilisateur WHERE utilisateur_id = ?";
        $stmtUtilisateur = $this->conn->prepare($queryUtilisateur);
        $stmtUtilisateur->bind_param("i", $utilisateur_id);
        
        return $stmtUtilisateur->execute();
    }

    // Filtrer les utilisateurs ayant role_id = 3
    public static function getFilteredUtilisateurs($filters) {
        global $conn; // Utilisation de la connexion globale
    
        $sql = "SELECT utilisateur_id, nom, prenom, email, pseudo FROM utilisateur WHERE role_id = 3";
    
        $conditions = [];

        if (!empty($filters['nom'])) {
            $pseudo = mysqli_real_escape_string($conn, $filters['nom']);
            $conditions[] = "utilisateur.nom LIKE '%$pseudo%'";
        }
        if (!empty($filters['prenom'])) {
            $pseudo = mysqli_real_escape_string($conn, $filters['prenom']);
            $conditions[] = "utilisateur.prenom LIKE '%$pseudo%'";
        }
        if (!empty($filters['email'])) {
            $pseudo = mysqli_real_escape_string($conn, $filters['email']);
            $conditions[] = "utilisateur.email LIKE '%$pseudo%'";
        }
        if (!empty($filters['pseudo'])) {
            $pseudo = mysqli_real_escape_string($conn, $filters['pseudo']);
            $conditions[] = "utilisateur.pseudo LIKE '%$pseudo%'";
        }
        if (!empty($conditions)) {
            $sql .= " AND " . implode(" AND ", $conditions);
        }
    
        $result = mysqli_query($conn, $sql);
    
        if (!$result) {
            die("Erreur SQL : " . mysqli_error($conn));
        }
    
        $utilisateurs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $utilisateurs[] = $row;
        }
    
        return $utilisateurs;
    }

    // Supprimer un utilisateur par son ID
    public function supprimerEmploye($Employe_id) {
        // Supprimer les réservations où l'utilisateur est passager
        $queryReservationsUser = "DELETE FROM reservation WHERE utilisateur_id = ?";
        $stmtReservationsUser = $this->conn->prepare($queryReservationsUser);
        $stmtReservationsUser->bind_param("i", $Employe_id);
        $stmtReservationsUser->execute();
        $stmtReservationsUser->close();
    
        // Supprimer les réservations des covoiturages créés par l'utilisateur
        $queryReservations = "DELETE FROM reservation WHERE covoiturage_id IN (SELECT covoiturage_id FROM covoiturage WHERE utilisateur_id = ?)";
        $stmtReservations = $this->conn->prepare($queryReservations);
        $stmtReservations->bind_param("i", $Employe_id);
        $stmtReservations->execute();
        $stmtReservations->close();
    
        // Supprimer les covoiturages de l'utilisateur
        $queryCovoiturages = "DELETE FROM covoiturage WHERE utilisateur_id = ?";
        $stmtCovoiturages = $this->conn->prepare($queryCovoiturages);
        $stmtCovoiturages->bind_param("i", $Employe_id);
        $stmtCovoiturages->execute();
        $stmtCovoiturages->close();
    
        // 4Supprimer les voitures de l'utilisateur
        $queryVoitures = "DELETE FROM voiture WHERE utilisateur_id = ?";
        $stmtVoitures = $this->conn->prepare($queryVoitures);
        $stmtVoitures->bind_param("i", $Employe_id);
        $stmtVoitures->execute();
        $stmtVoitures->close();
    
        // Supprimer l'utilisateur
        $queryUtilisateur = "DELETE FROM utilisateur WHERE utilisateur_id = ?";
        $stmtUtilisateur = $this->conn->prepare($queryUtilisateur);
        $stmtUtilisateur->bind_param("i", $Employe_id);
        
        return $stmtUtilisateur->execute();
    }

    // Filtrer les utilisateurs ayant role_id = 2
    public static function getFilteredEmployes($filters) {
        global $conn; // Utilisation de la connexion globale
    
        $sql = "SELECT utilisateur_id, nom, prenom, email, pseudo FROM utilisateur WHERE role_id = 2";
    
        $conditions = [];

        if (!empty($filters['nom'])) {
            $pseudo = mysqli_real_escape_string($conn, $filters['nom']);
            $conditions[] = "utilisateur.nom LIKE '%$pseudo%'";
        }
        if (!empty($filters['prenom'])) {
            $pseudo = mysqli_real_escape_string($conn, $filters['prenom']);
            $conditions[] = "utilisateur.prenom LIKE '%$pseudo%'";
        }
        if (!empty($filters['email'])) {
            $pseudo = mysqli_real_escape_string($conn, $filters['email']);
            $conditions[] = "utilisateur.email LIKE '%$pseudo%'";
        }
        if (!empty($filters['pseudo'])) {
            $pseudo = mysqli_real_escape_string($conn, $filters['pseudo']);
            $conditions[] = "utilisateur.pseudo LIKE '%$pseudo%'";
        }
        if (!empty($conditions)) {
            $sql .= " AND " . implode(" AND ", $conditions);
        }
    
        $result = mysqli_query($conn, $sql);
    
        if (!$result) {
            die("Erreur SQL : " . mysqli_error($conn));
        }
    
        $employes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $employes[] = $row;
        }
    
        return $employes;
    }
    public function registerEmploye($nom, $prenom, $email, $password, $pseudo, $role_id=2) {
        // Hasher le mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Requête d'insertion (SANS utilisateur_id car AUTO_INCREMENT)
        $sql = "INSERT INTO utilisateur (nom, prenom, email, password, pseudo, role_id) VALUES (?, ?, ?, ?, ?, ?)";
        // Préparation de la requête
        $stmt = $this->conn->prepare($sql);
        // Liaison des paramètres
        $stmt->bind_param("sssssi", $nom, $prenom, $email, $hashed_password, $pseudo,$role_id);
        // Exécution de la requête
        return $stmt->execute();
    }
    
}
?>