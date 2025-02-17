<?php
session_start(); // Démarrer la session si ce n'est pas déjà fait

// Inclure le modèle User pour la déconnexion
require_once __DIR__ . '/../database/db.php';  // Connexion à la base de données
require_once __DIR__ . '/../models/user.php';  // Modèle User

// Créer une instance de User
$userModel = new User($conn);

// Appeler la méthode logout() pour déconnecter l'utilisateur
$userModel->logout();

// Rediriger vers la page de connexion après déconnexion
header("Location: ../../index.php?page=signin");
exit();
?>