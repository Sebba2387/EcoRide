<?php
// Vérifier si l'utilisateur est admin ou employé
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../database/db.php';  // Connexion à la base de données
require_once __DIR__ .'/../models/user.php';  // Modèle User




$userModel = new User($conn);

// Récupérer la liste des utilisateurs avec role_id = 3
$utilisateurs = $userModel->getUtilisateursAvecRole3();

// Suppression d'un utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_utilisateur'])) {
    $utilisateur_id = $_POST['utilisateur_id'];
    $userModel->supprimerUtilisateur($utilisateur_id);
    header("Location: ../../index.php?page=gestionUtilisateurs"); // Recharge la page
    exit();
}

// Filtrer les utilisateurs ayant role_id = 3
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filters = [
        'nom' => $_POST['nom'] ?? '',
        'prenom' => $_POST['prenom'] ?? '',
        'email' => $_POST['email'] ?? '',
        'pseudo' => $_POST['pseudo'] ?? '',
    ];

    $utilisateurs = User::getFilteredUtilisateurs($filters);
}

// Modifier le mot de passe de l'utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_mdp'])) {
    if (!isset($_SESSION['utilisateur_id'])) {
        echo "<script>alert('Vous devez être connecté.'); window.location.href='../../index.php?page=signin.php';</script>";
        exit();
    }

    $ancien_mdp = $_POST['ancien_mdp'];
    $nouveau_mdp = $_POST['nouveau_mdp'];
    $confirmation_mdp = $_POST['confirmation_mdp'];

    if (empty($ancien_mdp) || empty($nouveau_mdp) || empty($confirmation_mdp)) {
        echo "<script>alert('Tous les champs sont obligatoires.'); 
        window.location.href='../../index.php?page=editPassword';
        </script>";
        exit();
    }

    if ($nouveau_mdp !== $confirmation_mdp) {
        echo "<script>alert('Les nouveaux mots de passe ne correspondent pas.'); 
        window.location.href='../../index.php?page=editPassword';
        </script>";
        exit();
    }

    $utilisateur = $userModel->getUserById($_SESSION['utilisateur_id']);

    if (!$utilisateur || !password_verify($ancien_mdp, $utilisateur['password'])) {
        echo "<script>alert('L\\'ancien mot de passe est incorrect.'); 
        window.location.href='../../index.php?page=editPassword';
        </script>";
        exit();
    }

    if ($userModel->updatePassword($_SESSION['utilisateur_id'], $nouveau_mdp)) {
        echo "<script>alert('Mot de passe mis à jour avec succès.'); 
        window.location.href='../../index.php?page=compte';
        </script>";
    } else {
        echo "<script>alert('Une erreur s\\'est produite.'); 
        window.location.href='../../index.php?page=editPassword';
        </script>";
    }

    exit();
}

?>