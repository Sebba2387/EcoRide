<?php
require_once __DIR__ . '/../database/db.php';  // Connexion à la base de données
require_once __DIR__ . '/../models/user.php';  // Modèle User

//Inscription Utilisateur
// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_utilisateur'])) {
    // Vérifier si toutes les données sont présentes
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) 
        && !empty($_POST['password']) && !empty($_POST['pseudo'])) {

        // Récupérer les valeurs du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pseudo = $_POST['pseudo'];

        // Créer une instance de User avec la connexion à la BD
        $userModel = new User($conn);

        // Appeler la fonction registerUser()
        if ($userModel->registerUser($nom, $prenom, $email, $password, $pseudo)) {
            header("Location: ../../index.php?page=signin"); // Redirection vers la connexion
            exit();
        } else {
            echo "Erreur lors de l'inscription.";
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
} else {
    echo "Requête invalide.";
}

?>