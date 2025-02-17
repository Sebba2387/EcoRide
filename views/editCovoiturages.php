<?php
// Inclure les fichiers nécessaires
require_once '/home/ecoriders/backend/database/db.php';
require_once '/home/ecoriders/backend/controllers/covoiturageController.php';
require_once '/home/ecoriders/backend/models/covoiturageModel.php';
require_once '/home/ecoriders/backend/models/voitureModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$voitureModel = new Voiture($conn);
$covoiturageModel = new Covoiturage($conn);
?>

<div class="container d-flex flex-column offset-md-1 mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-12 offset-md-2 mt-5 mb-5 offset-md-3 shadow-sm rounded" style="background-color: #F2F2F2;">
            <form class="p-3 text-center rounded" action="/loads/backend_loader.php" method="POST">
            <input type="hidden" name="covoiturage_id" value="<?= isset($_GET['covoiturage_id']) ? htmlspecialchars($_GET['covoiturage_id']) : '' ?>">
                <!-- Champs Départ côte à côte -->
                <div class="row mb-2">
                    <div class="col-md-4 py-2">
                        <label for="lieuDepart" class="form-label text-secondary">Lieu de départ</label>
                        <input type="text" class="form-control" name="lieu_depart" id="lieuDepart" placeholder="Lieu de départ*" value="<?= $covoiturage['lieu_depart']; ?>" required>
                    </div>
                    <div class="col-md-4 py-2">
                        <label for="dateDepart" class="form-label text-secondary">Date de départ</label>
                        <input type="date" class="form-control" name="date_depart" id="dateDepart" placeholder="Date de départ*" value="<?= $covoiturage['date_depart']; ?>" required>
                    </div>
                    <div class="col-md-4 py-2">
                        <label for="heureDepart" class="form-label text-secondary">Heure de départ</label>
                        <input type="time" class="form-control" name="heure_depart" id="heureDepart" placeholder="Heure de départ*" value="<?= $covoiturage['heure_depart']; ?>" required>
                    </div>
                </div>
                <!-- Champs Arrivée côte à côte -->
                <div class="row mb-2">
                    <div class="col-md-4 py-2">
                        <label for="lieuArrivee" class="form-label text-secondary">Lieu d'arrivée</label>
                        <input type="text" class="form-control" name="lieu_arrivee" id="lieuArrivee" placeholder="Lieu de Arrivée*" value="<?= $covoiturage['lieu_arrivee']; ?>" required>
                    </div>
                    <div class="col-md-4 py-2">
                        <label for="dateArrivee" class="form-label text-secondary">Date d'arrivée</label>
                        <input type="date" class="form-control" name="date_arrivee" id="dateArrivee" placeholder="Date de Arrivée*" value="<?= $covoiturage['date_arrivee']; ?>" required>
                    </div>
                    <div class="col-md-4 py-2">
                        <label for="heureArrivee" class="form-label text-secondary">Heure d'arrivée</label>
                        <input type="time" class="form-control" name="heure_arrivee" id="heureArrivee" placeholder="Heure de Arrivée*" value="<?= $covoiturage['heure_arrivee']; ?>" required>
                    </div>
                </div>
                <!-- Champs "prix" et "nombre de place" côte à côte -->
                <div class="row mb-2">
                    <div class="col-md-4 py-2">
                        <label for="prix" class="form-label text-secondary">Prix par personne</label>
                        <input type="number" class="form-control" name="prix" id="prixUnitaire" placeholder="Prix unitaire*" value="<?= $covoiturage['prix']; ?>" required>
                    </div>
                    <div class="col-md-4 py-2">
                        <label for="nombrePlaces" class="form-label text-secondary">Nombre de places</label>
                        <input type="number" class="form-control" name="nombre_places" id="nombrePlaces" placeholder="Nombre de places*" value="<?= $covoiturage['nombre_places']; ?>" required>
                    </div>
                    <div class="col-md-4 py-2">
                        <label for="voiture_id" class="form-label text-secondary">Voiture</label>
                        <select class="form-control text-center align-self-end" name="voiture_id" id="voiture_id" >
                            <?php foreach ($covoiturages as $covoiturage): ?>
                                <option value="<?= $covoiturage['voiture_id'] ?>"><?= $voiture['modele'] ?></option>
                            <?php endforeach; ?>
                        </select><br>
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-4 py-2 justify-content-center">
                        <button type="submit" class="btn btn-dark w-50 mt-3 py-2" name="miseAJourCovoiturage" style="color: #57F2AA;">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
