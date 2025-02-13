<?php
// Connexion à la base de données et récupération des covoiturages
require_once 'backend/controllers/covoiturageController.php';
require_once 'backend/database/db.php';
require_once 'backend/models/covoiturageModel.php';
require_once 'backend/models/voitureModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$covoiturageModel = new Covoiturage($conn);
$voitureModel = new Voiture($conn);

?>

<div class="container d-flex flex-column offset-md-1 mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-12 offset-md-2 mt-5 mb-5 offset-md-3 shadow-sm rounded" style="background-color: #F2F2F2;">
                <form class="p-3 text-center rounded" action="backend/controllers/covoiturageController.php" method="POST">
                    <!-- Champs Départ côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-4 py-2">
                            <input type="text" class="form-control" name="lieu_depart" id="lieuDepart" placeholder="Lieu de départ*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <input type="date" class="form-control" name="date_depart" id="dateDepart" placeholder="Date de départ*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <input type="time" class="form-control" name="heure_depart" id="heureDepart" placeholder="Heure de départ*" required>
                        </div>
                    </div>
                    <!-- Champs Arrivée côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-4 py-2">
                            <input type="text" class="form-control" name="lieu_arrivee" id="lieuArrivee" placeholder="Lieu de Arrivée*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <input type="date" class="form-control" name="date_arrivee" id="dateArrivee" placeholder="Date de Arrivée*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <input type="time" class="form-control" name="heure_arrivee" id="heureArrivee" placeholder="Heure de Arrivée*" required>
                        </div>
                    </div>
                    <!-- Champs "prix" et "nombre de place" côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-4 py-2">
                            <input type="number" class="form-control" name="prix" id="prixUnitaire" placeholder="Prix unitaire*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <input type="number" class="form-control" name="nombre_places" id="nombrePlaces" placeholder="Nombre de places*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <select class="form-control" name="voiture_id" id="voiture_id" >
                                <?php foreach ($voitures as $voiture): ?>
                                    <option value="<?= $voiture['voiture_id'] ?>"><?= $voiture['modele'] ?></option>
                                <?php endforeach; ?>
                            </select><br>
                        </div>
                    </div>
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-4 py-2 justify-content-center">
                            <button type="submit" class="btn btn-dark w-50 mt-3 py-2" name="addCovoiturage" style="color: #57F2AA;">Publier</button>
                        </div>
                    </div>
                </form>
                <h3 style="color: #57F2AA; font-weight: bold; font-size: 2rem;">Mes Covoiturages</h3>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th class="text-center">Réf</th>
                            <th class="text-center">Voiture</th>
                            <th class="text-center">Départ</th>
                            <th class="text-center">Ville de départ</th>
                            <th class="text-center">Arrivée</th>
                            <th class="text-center">Ville d'arrivée</th>
                            <th class="text-center">Nombre de places</th>
                            <th class="text-center">Prix</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($covoiturages as $covoiturage): ?>
                            <tr>
                                <td><?= $covoiturage['covoiturage_id'] ?></td>
                                <td>
                                    <?php 
                                    // Récupérer la voiture liée au covoiturage
                                    $voiture = $voitureModel->getVoitureById($covoiturage['voiture_id']);
                                    echo $voiture['modele']; 
                                    ?>
                                </td>
                                <td class="text-center"><?= $covoiturage['date_depart'] . ' ' . $covoiturage['heure_depart'] ?></td>
                                <td class="text-center"><?= $covoiturage['lieu_depart'] ?></td>
                                <td class="text-center"><?= $covoiturage['date_arrivee'] . ' ' . $covoiturage['heure_arrivee'] ?></td>
                                <td class="text-center"><?= $covoiturage['lieu_arrivee'] ?></td>
                                <td class="text-center"><?= $covoiturage['nombre_places'] ?></td>
                                <td class="text-center"><?= $covoiturage['prix'] ?></td>
                                <td>
                                <?php
                                    // Comparer la date et l'heure du covoiturage avec la date et l'heure actuelles
                                    if ($covoiturage['date_depart'] < $covoiturage['current_datetime']) {
                                        // Si la date et l'heure de départ sont dans le passé, ne pas afficher l'action
                                        echo '';
                                    } else {
                                        // Sinon, afficher les boutons d'action
                                        echo '<a class = "btn btn-warning text-white" href="index.php?page=editCovoiturages&covoiturage_id=' . $covoiturage['covoiturage_id'] . '">Modifier</a> 
                                            <a class = "btn btn-danger" href="backend/controllers/covoiturageController.php?annuler=' . $covoiturage['covoiturage_id'] . '">Annuler</a>';
                                    }
                                ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
