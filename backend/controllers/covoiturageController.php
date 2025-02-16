<?php
require_once __DIR__ .'/../models/voitureModel.php';
require_once __DIR__ .'/../models/covoiturageModel.php';
require_once __DIR__ .'/../database/db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vérification sécurisée
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: /../../index.php?page=signin");
    exit();
}

$voitureModel = new Voiture($conn);
$covoiturageModel = new Covoiturage($conn);
$covoiturages = $covoiturageModel->getCovoiturageById($_SESSION['utilisateur_id']);

$utilisateur_id = isset($_SESSION['utilisateur_id']) ? $_SESSION['utilisateur_id'] : 0;

// Récupérer la date et l'heure actuelles
$current_datetime = date("Y-m-d H:i:s");

// Récupérer les covoiturages de l'utilisateur
$covoiturages = $covoiturageModel->getCovoituragesByUtilisateurId($_SESSION['utilisateur_id']);


// Récupérer les voitures de l'utilisateur
$voitures = $voitureModel->getVoituresByUserId($_SESSION['utilisateur_id']);
$voitures = $voitureModel->getUserCars($_SESSION['utilisateur_id']);

// Récupérer les voitures de l'utilisateur
$user_id = $_SESSION['utilisateur_id'];
$voitures = $voitureModel->getUserCars($user_id);

// Ajouter un covoiturage
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['addCovoiturage'])) {
    $voiture_id = $_POST['voiture_id'];
    $date_depart = $_POST['date_depart'];
    $heure_depart = $_POST['heure_depart'];
    $lieu_depart = $_POST['lieu_depart'];
    $date_arrivee = $_POST['date_arrivee'];
    $heure_arrivee = $_POST['heure_arrivee'];
    $lieu_arrivee = $_POST['lieu_arrivee'];
    $nombre_places = $_POST['nombre_places'];
    $prix = $_POST['prix'];

    // Ajouter le covoiturage
    $covoiturageModel->addCovoiturage($_SESSION['utilisateur_id'], $voiture_id, $date_depart, $heure_depart, $lieu_depart, $date_arrivee, $heure_arrivee, $lieu_arrivee, $nombre_places, $prix);
    echo "<script>
        alert('Covoiturage ajouté avec succès !');
        window.location.href = '../../index.php?page=covoiturages';
      </script>";  // Redirection vers la page des covoiturages
    exit();
}

// Annuler un covoiturage
if (isset($_GET['annuler'])) {
    $covoiturage_id = $_GET['annuler'];
    $covoiturageModel->supprimerCovoiturage($covoiturage_id);  // Suppression du covoiturage
    echo "<script>
        alert('Covoiturage annulé avec succès !');
        window.location.href = '../../index.php?page=covoiturages';
      </script>";  // Redirection vers la page des covoiturages
    exit();
}

// Mettre à jour le covoiturage
if (isset($_GET['id'])) {
    $covoiturage_id = $_GET['id'];
    $covoiturage = $covoiturageModel->getCovoiturageById($covoiturage_id);
}

// Vérifier si un ID de voiture est passé dans l'URL
if (isset($_GET['id'])) {
    $voiture_id = $_GET['id'];
    $voiture = $voitureModel->getVoitureById($voiture_id);
}

// Vérifier si le covoiturage_id est passé dans l'URL
if (isset($_GET['covoiturage_id'])) {
    $covoiturage_id = $_GET['covoiturage_id'];

    // Récupérer les informations du covoiturage
    $covoiturageModel = new Covoiturage($conn);
    $covoiturage = $covoiturageModel->getCovoiturageById($covoiturage_id);
    if (!$covoiturage) {
        echo "Covoiturage non trouvé.";
        exit;
    }

    // Récupérer les informations de la voiture associée
    $voitureModel = new Voiture($conn);
    $voiture = $voitureModel->getVoitureById($covoiturage['voiture_id']);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['miseAJourCovoiturage'])) {
    if (!isset($_POST['covoiturage_id']) || empty($_POST['covoiturage_id'])) {
        die("Erreur : ID du covoiturage manquant.");
    }

    $covoiturage_id = $_POST['covoiturage_id'];
    $date_depart = $_POST['date_depart'];
    $heure_depart = $_POST['heure_depart'];
    $lieu_depart = $_POST['lieu_depart'];
    $date_arrivee = $_POST['date_arrivee'];
    $heure_arrivee = $_POST['heure_arrivee'];
    $lieu_arrivee = $_POST['lieu_arrivee'];
    $nombre_places = $_POST['nombre_places'];
    $prix = $_POST['prix'];

    $covoiturageModel->updateCovoiturage($covoiturage_id, $date_depart, $heure_depart, $lieu_depart, $date_arrivee, $heure_arrivee, $lieu_arrivee, $nombre_places, $prix);

    echo "<script>
        alert('Covoiturage mis à jour avec succès !');
        window.location.href = '../../index.php?page=covoiturages';
    </script>";
}

// Filtrer les covoiturages dont les places disponible >= 0
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filters = [
        'pseudo' => $_POST['pseudo'] ?? '',
        'lieu_depart' => $_POST['lieu_depart'] ?? '',
        'lieu_arrivee' => $_POST['lieu_arrivee'] ?? '',
        'date_depart' => $_POST['date_depart'] ?? '',
        'nombre_places' => $_POST['nombre_places'] ?? '',
        'duree' => $_POST['duree'] ?? '',
        'energie' => $_POST['energie'] ?? '',
        'note' => $_POST['note'] ?? '',
        'prix' => $_POST['prix'] ?? '',
    ];

    $covoiturages = Covoiturage::getFilteredCovoiturages($filters, $utilisateur_id);
}

//======PARTIE ADMIN & EMPLOYE======//
// Suppression d'un covoiturage
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer'])) {
    $covoiturage_id = $_POST['covoiturage_id'];
    $covoiturageModel->supprimerCovoiturage($covoiturage_id);
    header("Location: ../../index.php?page=gestionCovoiturages"); // Recharge la page
    exit();
}


?>