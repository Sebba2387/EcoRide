<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Installation les styles SCSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="scss/main.css">
    <title>EcoRide</title>
</head>
<body>
<?php
    // Démarrer la session si besoin
    session_start();

    // Inclure les fichiers nécessaires
    include_once "includes/header.php";

    // Inclure le fichier de routage
    include_once "routes/routage.php";

    // Récupérer l’URL demandée
    $page = isset($_GET['page']) ? $_GET['page'] : "";

    // Récupérer la page et l'indicateur de la sidebar
    list($pageToInclude, $showSidebar) = getRoute($page);

    // Si la page nécessite la sidebar, inclure la sidebar
    if ($showSidebar) {
        include_once "includes/sidebar.php";
    }

    // Inclure la page correspondante
    include_once $pageToInclude;  // Assurez-vous d'utiliser include_once pour éviter l'inclusion multiple

    // Inclure le footer
    include_once "includes/footer.php";
    ?>
    <main id="main-page" class="col-10 col-md-9 ">
        <!-- Le contenu de la page sera injecté ici -->
    </main>
    <script src="js/script.js"></script>
    <!-- Installation du strcipt JS pour Bootstrap -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>