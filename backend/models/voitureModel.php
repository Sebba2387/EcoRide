<?php
class Voiture {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Ajouter une voiture
    public function addVoiture($utilisateur_id, $modele, $immatriculation, $energie, $couleur, $date_immatriculation) {
        $sql = "INSERT INTO voiture (utilisateur_id, modele, immatriculation, energie, couleur, date_immatriculation) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssss", $utilisateur_id, $modele, $immatriculation, $energie, $couleur, $date_immatriculation);
        return $stmt->execute();
    }

    // Obtenir toutes les voitures d'un utilisateur
    public function getVoituresByUserId($utilisateur_id) {
        $sql = "SELECT * FROM voiture WHERE utilisateur_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $utilisateur_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Obtenir une voiture par son ID
    public function getVoitureById($voiture_id) {
        $sql = "SELECT * FROM voiture WHERE voiture_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $voiture_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); 
    }

    // Mettre à jour une voiture
    public function updateVoiture($voiture_id, $modele, $immatriculation, $energie, $couleur, $date_immatriculation) {
        $sql = "UPDATE voiture SET modele = ?, immatriculation = ?, energie = ?, couleur = ?, date_immatriculation = ? WHERE voiture_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $modele, $immatriculation, $energie, $couleur, $date_immatriculation, $voiture_id);
        return $stmt->execute();
    }

    // Supprimer une voiture si elle n'est pas liée à un covoiturage
    public function deleteVoiture($voiture_id) {
        // Vérifier si la voiture est liée à un covoiturage
        $sqlCheck = "SELECT * FROM covoiturage WHERE voiture_id = ?";
        $stmtCheck = $this->conn->prepare($sqlCheck);
        $stmtCheck->bind_param("i", $voiture_id);
        $stmtCheck->execute();

        // Vérifier s'il y a des résultats
        $stmtCheck->store_result();
        if ($stmtCheck->num_rows > 0) {
            // La voiture est liée à un covoiturage, on ne la supprime pas
            return "Cette voiture est actuellement liée à un covoiturage et ne peut pas être supprimée.";
        }
        // Si la voiture n'est pas liée, la supprimer
        $sqlDelete = "DELETE FROM voiture WHERE voiture_id = ?";
        $stmtDelete = $this->conn->prepare($sqlDelete);
        $stmtDelete->bind_param("i", $voiture_id);
        
        if ($stmtDelete->execute()) {
            // Si l'exécution de la requête de suppression a réussi
            return "Voiture supprimée avec succès.";
        } else {
            // Si une erreur s'est produite lors de la suppression
            return "Une erreur est survenue lors de la suppression de la voiture.";
        }
    }
    //Méthode pour récupérer les voitures d'un utilisateur
    public function getUserCars($user_id) {
        // Modification de la requête SQL en utilisant un point d'interrogation à la place de :user_id
        $query = "SELECT * FROM voiture WHERE utilisateur_id = ?";
        // Préparer la requête
        $stmt = $this->conn->prepare($query);
        // Lier le paramètre utilisateur_id
        $stmt->bind_param("i", $user_id); // "i" pour un entier
        // Exécuter la requête
        $stmt->execute();
        // Récupérer les résultats
        $result = $stmt->get_result();
        // Retourner tous les résultats sous forme de tableau associatif
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>