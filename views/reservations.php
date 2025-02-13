<?php
// Connexion à la base de données et récupération des covoiturages
// require_once 'backend/database/db.php';


// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

// $covoiturageModel = new Covoiturage($conn);
// $voitureModel = new Voiture($conn);

// if (!isset($_SESSION['utilisateur_id'])) {
//     echo "<script>
//                 alert('Vous devez être connecté pour réserver.');
//                 window.location.href = 'signin.php';
//               </script>";
//     exit;
// }

// if (isset($_POST['covoiturage_id'], $_POST['voiture_id'])) {
//     $covoiturage_id = $_POST['covoiturage_id'];
//     $voiture_id = $_POST['voiture_id'];
//     $utilisateur_id = $_SESSION['utilisateur_id'];

//     // Insérer la réservation dans la BDD
//     $query = "INSERT INTO reservation (covoiturage_id, utilisateur_id, voiture_id, statut) VALUES (?, ?, ?, 'en attente')";
//     $stmt = $conn->prepare($query);
//     $stmt->bind_param("iii", $covoiturage_id, $utilisateur_id, $voiture_id);

//     if ($stmt->execute()) {
//         echo "<script>
//                 alert('Réservation envoyée avec succès !');
//                 window.location.href = 'http://127.0.0.1/EcoRide/index.php?page=editReservations';
//               </script>";
//     } else {
//         echo "<script>alert('Erreur lors de la réservation.'); window.history.back();</script>";
//     }
// }
?>