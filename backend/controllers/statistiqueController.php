<?php
require_once '/home/ecoriders/backend/database/db.php';
require_once '/home/ecoriders/backend/controllers/statistiqueModel.php';

$modele = new StatistiqueModel($connexion);

$covoituragesParMois = $modele->getCovoituragesParMois();
$revenusParMois = $modele->getRevenusParMois();
$statsGenerales = $modele->getStatistiquesGenerales();
?>