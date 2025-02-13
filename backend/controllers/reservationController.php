<?php
// Connexion à la base de données et récupération des covoiturages
require_once __DIR__ . '/../database/db.php';  // Connexion à la base de données
require_once __DIR__ .'/../models/reservationModel.php';  // Modèle Réservation


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vérification sécurisée
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: /EcoRide/index.php?page=signin");
    exit();
}

$reservation = new Reservation($conn);
$utilisateur_id = $_SESSION['utilisateur_id'];

// Annuler une réservation (par l'utilisateur)
if (isset($_GET['annuler'])) {
    $reservation_id = intval($_GET['annuler']);
    if ($reservation->annulerReservation($reservation_id, $utilisateur_id)) {
        echo "<script>
                alert('Réservation annulée avec succès !');
                window.location.href = 'http://127.0.0.1/EcoRide/index.php?page=editReservations';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Erreur lors de l\'annulation de la réservation.');
                window.history.back();
              </script>";
        exit();
    }
}

// Accepter une réservation (par le créateur du covoiturage)
if (isset($_GET['accepter'])) {
    $reservation_id = intval($_GET['accepter']);
    if ($reservation->accepterReservation($reservation_id, $utilisateur_id)) {
        echo "<script>
                alert('Réservation acceptée avec succès !');
                window.location.href = 'http://127.0.0.1/EcoRide/index.php?page=editReservations';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Erreur lors de l\'acceptation de la réservation.');
                window.history.back();
              </script>";
        exit();
    }
}

// Terminer une réservation (par le créateur ou le passager)
if (isset($_GET['terminer'])) {
    $reservation_id = intval($_GET['terminer']);
    if ($reservation->terminerReservation($reservation_id, $utilisateur_id)) {
        echo "<script>
                alert('Réservation terminée avec succès !');
                window.location.href = 'http://127.0.0.1/EcoRide/index.php?page=editReservations';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Erreur lors de la finalisation de la réservation.');
                window.history.back();
              </script>";
        exit();
    }
}

// Refuser une réservation (par le créateur du covoiturage)
if (isset($_GET['refuser'])) {
    $reservation_id = intval($_GET['refuser']);
    if ($reservation->refuserReservation($reservation_id, $utilisateur_id)) {
        echo "<script>
                alert('Réservation refusée avec succès !');
                window.location.href = 'http://127.0.0.1/EcoRide/index.php?page=editReservations';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Erreur lors du refus de la réservation.');
                window.history.back();
              </script>";
        exit();
    }
}

//Ajout du traitement lorsqu'un utilisateur clique sur "Réserver" :
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $covoiturage_id = isset($_POST['covoiturage_id']) ? intval($_POST['covoiturage_id']) : null;
    $voiture_id = isset($_POST['voiture_id']) ? intval($_POST['voiture_id']) : null;
    
    // Récupérer voiture_id associé au covoiturage
    $sql = "SELECT voiture_id FROM covoiturage WHERE covoiturage_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $covoiturage_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $voiture_id = $row ? $row['voiture_id'] : null;

    if ($voiture_id === null) {
        die("Erreur : voiture_id introuvable pour ce covoiturage.");
    }

    // Ajouter la réservation
    $reservation = new Reservation($conn);
    if ($reservation->ajouterReservation($utilisateur_id, $covoiturage_id, $voiture_id)) {
        echo "<script>
                alert('Réservation envoyée avec succès !');
                window.location.href = 'http://127.0.0.1/EcoRide/index.php?page=editReservations';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Erreur lors du de la réservation.');
                window.history.back();
              </script>";
        exit();
    }
}
?>