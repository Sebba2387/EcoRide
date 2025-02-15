<?php
require_once __DIR__ . '/../database/db.php';  // Connexion à la base de données
require_once __DIR__ . '/../models/user.php';  // Modèle User

$userModel = new User($conn);
// Récupérer la liste des utilisateurs avec role_id = 2
$employes = $userModel->getEmployesAvecRole2();

// Suppression d'un employé
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_employe'])) {
    $Employe_id = $_POST['utilisateur_id'];
    $userModel->supprimerEmploye($Employe_id);
    header("Location: ../../index.php?page=gestionEmployes");
    exit();
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
            header("Location: /EcoRide/index.php?page=gestionEmployes"); // Redirection vers la gestion des employés
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'employé.";
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
}

// Filtrer les employes ayant role_id = 2
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filters = [
        'nom' => $_POST['nom'] ?? '',
        'prenom' => $_POST['prenom'] ?? '',
        'email' => $_POST['email'] ?? '',
        'pseudo' => $_POST['pseudo'] ?? '',
    ];

    $employes = User::getFilteredEmployes($filters);
}


?>