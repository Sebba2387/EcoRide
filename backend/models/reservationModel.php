<?php
class Reservation {
    private $conn;
    private $table = 'reservation';

    public function __construct($db) {
        $this->conn = $db;
    }
    // Ajouter une réservation
    public function ajouterReservation($utilisateur_id, $covoiturage_id, $voiture_id) {
        $sql = "INSERT INTO reservation (utilisateur_id, covoiturage_id, voiture_id, statut) VALUES (?, ?, ?, 'en attente')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $utilisateur_id, $covoiturage_id, $voiture_id);

        return $stmt->execute();
    }
    // Annuler une réservation (côté utilisateur)
    public function annulerReservation($reservation_id, $utilisateur_id) {
        // Récupérer les informations avant suppression
        $queryCovoit = "SELECT c.covoiturage_id, c.nombre_places 
                        FROM covoiturage c
                        INNER JOIN " . $this->table . " r ON c.covoiturage_id = r.covoiturage_id
                        WHERE r.reservation_id = ?";
        $stmtCovoit = $this->conn->prepare($queryCovoit);
        $stmtCovoit->bind_param("i", $reservation_id);
        $stmtCovoit->execute();
        $result = $stmtCovoit->get_result();
    
        if ($row = $result->fetch_assoc()) {
            $covoiturage_id = $row['covoiturage_id'];
            $nombre_places_avant = $row['nombre_places']; 
    
            // Mettre à jour le statut de la réservation
            $query = "UPDATE " . $this->table . " SET statut = 'annulée' WHERE reservation_id = ? AND utilisateur_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ii", $reservation_id, $utilisateur_id);
            $stmt->execute();
    
            // Supprimer la réservation après mise à jour du statut
            $queryDelete = "DELETE FROM " . $this->table . " WHERE reservation_id = ?";
            $stmtDelete = $this->conn->prepare($queryDelete);
            $stmtDelete->bind_param("i", $reservation_id);
            $stmtDelete->execute();
    
            // Réinitialiser le nombre de places à la valeur d'avant suppression
            $updatePlaces = "UPDATE covoiturage SET nombre_places = ? WHERE covoiturage_id = ?";
            $stmtUpdate = $this->conn->prepare($updatePlaces);
            $stmtUpdate->bind_param("ii", $nombre_places_avant, $covoiturage_id);
            return $stmtUpdate->execute();
        }
    
        return false;
    }

    // Accepter une réservation (côté créateur)
    public function accepterReservation($reservation_id, $createur_id) {
        $query = "UPDATE " . $this->table . " r
                  JOIN covoiturage c ON r.covoiturage_id = c.covoiturage_id
                  SET r.statut = 'acceptée' 
                  WHERE r.reservation_id = ? AND c.utilisateur_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $reservation_id, $createur_id);
    
        if ($stmt->execute()) {
            // Réduire le nombre de places disponibles
            $updatePlaces = "UPDATE covoiturage SET nombre_places = nombre_places - 1 WHERE covoiturage_id = 
                            (SELECT covoiturage_id FROM reservation WHERE reservation_id = ?)";
            $stmtUpdate = $this->conn->prepare($updatePlaces);
            $stmtUpdate->bind_param("i", $reservation_id);
            return $stmtUpdate->execute();
        }
        return false;
    }

    // Terminer une réservation (côté créateur et passager)
    public function terminerReservation($reservation_id, $utilisateur_id) {
        $query = "UPDATE " . $this->table . " SET statut = 'terminée' WHERE reservation_id = ? AND (utilisateur_id = ? OR covoiturage_id IN (SELECT covoiturage_id FROM covoiturage WHERE utilisateur_id = ?))";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iii", $reservation_id, $utilisateur_id, $utilisateur_id);
        return $stmt->execute();
    }

    // Refuser une réservation (côté créateur)
    public function refuserReservation($reservation_id, $createur_id) {
        $query = "UPDATE reservation r
                  JOIN covoiturage c ON r.covoiturage_id = c.covoiturage_id
                  SET r.statut = 'refusée' 
                  WHERE r.reservation_id = ? AND c.utilisateur_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $reservation_id, $createur_id);
    
        if (!$stmt->execute()) { 
            die("Erreur SQL : " . $stmt->error); // Affiche l'erreur SQL
        }
    
        return true;
    }
}
?>