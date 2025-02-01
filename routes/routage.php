<?php
// routes/routage.php

function getRoute($page) {
    // Tableau des routes
    $routes = [
        ""              => ["views/home.php", false],
        "presentation"  => ["views/presentation.php", false],
        "services"      => ["views/services.php", false],
        "contact"       => ["views/contact.php", false],
        "signin"        => ["views/auth/connexion.php", false],
        "signup"        => ["views/auth/inscription.php", false],
        "editPassword"        => ["views/auth/editPassword.php", false],
        "compte"        => ["views/auth/compte.php", true],
        "vehicules"     => ["views/vehicules.php", true],
        "voyages"       => ["views/voyages.php", true],
        "avis"          => ["views/avis.php", true],
    ];

    // Si la page existe dans les routes, on retourne le chemin et l'état de la sidebar
    if (isset($routes[$page])) {
        return $routes[$page]; // [chemin de la page, afficher sidebar (true/false)]
    } else {
        return ["views/404.php", false]; // Page introuvable, pas de sidebar
    }
}
?>
