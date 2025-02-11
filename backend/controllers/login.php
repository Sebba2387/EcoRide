<<?php
session_start();
require_once __DIR__ . '/../database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier si l'utilisateur existe
    $query = "SELECT utilisateur_id, nom, prenom, email, pseudo, role_id, password FROM utilisateur WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Vérification du mot de passe
        if (password_verify($password, $user['password'])) {
            // Stocker les infos de l'utilisateur en session
            $_SESSION['utilisateur_id'] = $user['utilisateur_id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['pseudo'] = $user['pseudo'];
            $_SESSION['role_id'] = $user['role_id'];

            // Redirection vers le dashboard
            header("Location: ../../views/compte.php");
            exit();
        } else {
            $_SESSION['message'] = "Mot de passe incorrect.";
            header("Location: ../../views/connexion.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "Utilisateur non trouvé.";
        header("Location: ../../views/connexion.php");
        exit();
    }
}
?>