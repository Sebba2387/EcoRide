<?php
// Connexion à la base de données et récupération des covoiturages
require_once __DIR__ . '/../database/db.php';  // Connexion à la base de données
require_once __DIR__ .'/../models/reservationModel.php';  // Modèle Réservation



if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vérification sécurisée
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: ../../index.php?page=signin");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $utilisateur_id = $_SESSION['utilisateur_id'];
    $covoiturage_id = $_POST['covoiturage_id'];
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];

    $query = "INSERT INTO avis (utilisateur_id, covoiturage_id, commentaire, note) 
              VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iisi", $utilisateur_id, $covoiturage_id, $commentaire, $note);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Avis émis avec succès !');
                window.location.href = '../../index.php?page=avis';
              </script>";
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'avis.";
    }
}
?>