<?php
require_once __DIR__ . '/../database/db.php';  // Connexion à la base de données
require_once __DIR__ .'/../models/voitureModel.php';  // Modèle Voiture

// if (!isset($_SESSION['utilisateur_id'])) {
//     header("Location: index.php?page=signin");
//     exit();
// }

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$voitureModel = new Voiture($conn);
$voitures = $voitureModel->getVoituresByUserId($_SESSION['utilisateur_id']);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ajouterVoiture'])) {
    // Ajouter une voiture
    $modele = $_POST['modele'];
    $immatriculation = $_POST['immatriculation'];
    $energie = $_POST['energie'];
    $couleur = $_POST['couleur'];
    $date_immatriculation = $_POST['date_immatriculation'];

    $voitureModel->addVoiture($_SESSION['utilisateur_id'], $modele, $immatriculation, $energie, $couleur, $date_immatriculation);
    header("Location: ../../index.php?page=voitures");
    exit();
}

if (isset($_GET['delete'])) {
    // Supprimer une voiture
    $voiture_id = $_GET['delete'];
    $voitureModel->deleteVoiture($voiture_id);
    header("Location: ../../index.php?page=voitures");
    exit();
}



// Vérifier si un ID de voiture est passé dans l'URL
if (isset($_GET['id'])) {
    $voiture_id = $_GET['id'];
    $voiture = $voitureModel->getVoitureById($voiture_id);
}

// Mettre à jour la voiture
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['miseAJourVoiture'])) {
    $modele = $_POST['modele'];
    $immatriculation = $_POST['immatriculation'];
    $energie = $_POST['energie'];
    $couleur = $_POST['couleur'];
    $date_immatriculation = $_POST['date_immatriculation'];

    $voitureModel->updateVoiture($voiture_id, $modele, $immatriculation, $energie, $couleur, $date_immatriculation);
    echo "<script>
        alert('Mise à jour faite avec succès !');
        window.location.href = 'http://127.0.0.1/EcoRide/index.php?page=voitures';
      </script>";
    exit();
}

?>