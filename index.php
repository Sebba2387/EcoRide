<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Installation les styles SCSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/main.css">
    <title>Document</title>
</head>
<body>
    <?php
    // Démarrer la session si besoin
    session_start();

    // Inclure les fichiers nécessaires
    include_once "includes/header.php";

    // Définir les routes
    $routes = [
        ""              => "views/home.php",
        "presentation"  => "views/presentation.php",
        "services"      => "views/services.php",
        "contact"       => "views/contact.php",
        "signin"        => "views/connexion.php",
        "signup"        => "views/inscription.php",
        "compte"        => "views/compte.php",
        "vehicules"     => "views/vehicules.php",
        "voyages"       => "views/voyages.php",
        "avis"          => "views/avis.php",
    ];

    // Récupérer l’URL demandée
    $page = isset($_GET['page']) ? $_GET['page'] : "";

    // Vérifier si la page existe dans les routes
    if (array_key_exists($page, $routes)) {
        include $routes[$page];
    } else {
        include "views/404.php"; // Page introuvable
    }

    // Inclure le footer
    include_once "includes/footer.php";
    ?>

    
    <main id="main-page" class="col-md-10 col-10">
        <!-- Le contenu de la page sera injecté ici -->
    </main>

    <script src="js/script.js"></script>
    <script type="module" src="router/router.js"></script>
    <!-- Installation du strcipt JS pour Bootstrap -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>