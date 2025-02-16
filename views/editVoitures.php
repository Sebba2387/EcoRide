<?php
require_once 'backend/database/db.php';  // Connexion à la base de données
require_once 'backend/models/voitureModel.php';  // Modèle Voiture
require_once 'backend/controllers/voitureController.php';  // Controller Voiture

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$voitureModel = new Voiture($conn);
// Vérifier si un ID de voiture est passé dans l'URL
// if (isset($_GET['id'])) {
//     $voiture_id = $_GET['id'];
//     $voiture = $voitureModel->getVoitureById($voiture_id);
// }

?>
<div class="container d-flex flex-column offset-md-1 mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-9 offset-md-2 mt-5 mb-5 offset-md-3 shadow-sm rounded" style="background-color: #F2F2F2;"> 
            <!-- Formulaire d'ajout de voiture -->
            <form id="form-voiture" class="mb-5 mt-3 p-3 text-center rounded" action="index.php?page=editVoitures&id=<?= $voiture['voiture_id'];?>" method="POST">
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-5 py-2 text-center align-self-end">
                        <label for="model" class="form-label text-secondary">Modèle</label>
                        <input type="text" class="form-control" name="modele" id="modele" placeholder="Modèle*" value="<?= $voiture['modele']; ?>" required>
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-5 py-2">
                        <label for="immatriculation" class="form-label text-secondary">Immatriculation</label>
                        <input type="text" class="form-control" name="immatriculation" id="immatriculation" placeholder="Immatriculation*" value="<?= $voiture['immatriculation']; ?>" required>
                    </div>
                    <div class="col-md-5 py-2">
                        <label for="date_immatriculation" class="form-label text-secondary">Date de la première mmatriculation</label>
                        <input type="date" class="form-control" name="date_immatriculation" id="immatriculationDate" placeholder="Date première immatriculation*" value="<?= $voiture['date_immatriculation']; ?>" required>
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-5 py-2">
                        <label for="energie" class="form-label text-secondary">Énergie</label>
                        <input type="text" class="form-control" name="energie" id="energie" placeholder="Énergie*" value="<?= $voiture['energie']; ?>" required>
                    </div>
                    <div class="col-md-5 py-2">
                        <label for="couleur" class="form-label text-secondary">Couleur</label>
                        <input type="text" class="form-control" name="couleur" id="couleur" placeholder="Couleur*" value="<?= $voiture['couleur']; ?>" required>
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-5 d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark mt-3 " name="miseAJourVoiture" style="color: #57F2AA;">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>