<?php
require_once __DIR__ . '/../database/db.php';  // Connexion à la base de données
require_once __DIR__ . '/../models/user.php';  // Modèle User

//Inscription Utilisateur
// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_utilisateur'])) {
    // Vérifier si toutes les données sont présentes
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['pseudo'])) {
        
        // Récupérer les valeurs du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pseudo = $_POST['pseudo'];

        // Créer une instance de User avec la connexion à la BD
        $userModel = new User($conn);  // MPORTANT : on passe $conn à User

        // Appeler la fonction registerUser()
        if ($userModel->registerUser($nom, $prenom, $email, $password, $pseudo)) {
            header("Location: ../../index.php?page=compte"); // Redirection vers la connexion
            exit();
        } else {
            echo "<script>
                alert('Erreur lors de l'inscription.');
                window.location.href = '../../index.php?page=signup';
                </script>";
        }
    } else {
        echo "<script>
                alert('Tous les champs doivent être remplis.');
                window.location.href = '../../index.php?page=signup';
                </script>";
    }
} else {
    echo "<script>
                alert('Requête invalide.');
                window.location.href = '../../index.php?page=signup';
                </script>";
}

//Inscription Employer
// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_employe'])) {
    // Vérifier si toutes les données sont présentes
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['pseudo'])) {
        
        // Récupérer les valeurs du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pseudo = $_POST['pseudo'];

        // Valeur pour le role_id
        $role_id = 2; // Ex : attribuer directement le role_id ou obtenir une valeur dynamique.

        // Créer une instance de User avec la connexion à la BD
        $userModel = new User($conn);

        // Appeler la fonction registerEmploye() pour ajouter l'employé
        if ($userModel->registerEmploye($nom, $prenom, $email, $password, $pseudo, $role_id)) {
            echo "Inscription réussie !";
            header("Location: ../../views/gestion_employes.php"); // Redirection vers la gestion des employés
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'employé.";
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
} else {
    echo "Requête invalide.";
}
?>