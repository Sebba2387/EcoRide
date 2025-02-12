<?php
session_start();
require_once __DIR__ . '/../database/db.php';  // Connexion à la base de données
require_once __DIR__ . '/../models/user.php';  // Modèle User

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: /index.php?page=signup");
    exit();
}

// Vérifier que la requête est bien un POST et que le bouton "update" est cliqué
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $userModel = new User($conn);

    $utilisateur_id = $_SESSION['utilisateur_id']; // Correction : prendre l'ID de session
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $pseudo = trim($_POST['pseudo']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);
    $adresse = trim($_POST['adresse']);
    $date_naissance = trim($_POST['date_naissance']);

    // Vérifier que les champs ne sont pas vides
    if (empty($nom) || empty($prenom) || empty($pseudo) || empty($email)|| empty($telephone)|| empty($adresse)|| empty($date_naissance)) {
        $message = "Tous les champs sont obligatoires.";
    } else {
        if ($userModel->updateUser($utilisateur_id, $nom, $prenom, $pseudo, $email, $telephone, $adresse, $date_naissance)) {
            $message = "Mise à jour réussie !";
        } else {
            $message = "Erreur lors de la mise à jour.";
        }
    }

    echo "<script>
        alert('$message');
        window.location.href = '../../index.php?page=compte';
    </script>";
    exit();
}
?>