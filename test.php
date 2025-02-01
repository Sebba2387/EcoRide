<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page avec 3 éléments côte à côte</title>
    <style>
        /* Style général pour le body */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        /* Conteneur principal */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px;
        }

        /* Flexbox pour la ligne */
        .row-flex {
            display: flex; /* Utilise flexbox pour disposer les éléments en ligne */
            justify-content: space-between; /* Espaces égaux entre les éléments */
            flex-wrap: wrap; /* Permet aux éléments de se réorganiser sur plusieurs lignes si nécessaire */
        }

        /* Style de chaque élément */
        .box {
            width: 30%; /* Chaque boîte occupe 30% de la largeur de l'écran */
            border: 1px solid #ccc;
            text-align: center;
            margin-bottom: 20px; /* Ajoute de l'espace entre les éléments sur les petites tailles d'écran */
        }

        /* Si la largeur de l'écran est inférieure à 768px (mobile), on empile les éléments */
        @media (max-width: 768px) {
            .box {
                width: 100%; /* Les éléments prennent toute la largeur sur mobile */
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row-flex">
            <!-- Colonne 1 -->
            <div class="box">
                <p>Élément 1</p>
            </div>

            <!-- Colonne 2 -->
            <div class="box">
                <p>Élément 2</p>
            </div>

            <!-- Colonne 3 -->
            <div class="box">
                <p>Élément 3</p>
            </div>
        </div>
    </div>

</body>
</html>
