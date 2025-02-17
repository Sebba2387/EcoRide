<?php
// Démarrer la session si ce n'est pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Inclure le fichier de traitement de la connexion dans le backend
require_once __DIR__ . '/../../backend/controllers/compteController.php';
require_once __DIR__ . '/../../backend/controllers/userController.php';
require_once __DIR__ . '/../../backend/controllers/voitureController.php';
require_once __DIR__ . '/../../backend/controllers/covoiturageController.php';
require_once __DIR__ . '/../../backend/controllers/reservationController.php';
require_once __DIR__ . '/../../backend/controllers/avisController.php';
?>
