<?php
require_once 'backend/database/db.php';  // Connexion à la base de données
require_once 'backend/models/voitureModel.php';  // Modèle User
require_once 'backend/controllers/voitureController.php';  // Controller Voiture

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$voitureModel = new Voiture($conn);
$voitures = $voitureModel->getVoituresByUserId($_SESSION['utilisateur_id']);

?>

<div class="container d-flex flex-column offset-md-1 mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-9 offset-md-2 mt-5 mb-5 offset-md-3 shadow-sm rounded" style="background-color: #F2F2F2;">
            <!-- Formulaire d'ajout de voiture -->
            <form id="form-voiture" class="mb-5 mt-3 p-3 text-center rounded" action="backend/controllers/voitureController.php" method="POST">
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-5 py-2 text-center align-self-end">
                        <input type="text" class="form-control" name="modele" id="modele" placeholder="Modèle*" required>
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <input type="text" class="form-control" name="immatriculation" id="immatriculation" placeholder="Immatriculation*" required>
                        </div>
                        <div class="col-md-5 py-2">
                            <input type="date" class="form-control" name="date_immatriculation" id="date_immatriculation" placeholder="Date première immatriculation*" required>
                        </div>
                </div>
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-5 py-2">
                        <input type="text" class="form-control" name="energie" id="energie" placeholder="Énergie*" required>
                    </div>
                    <div class="col-md-5 py-2">
                        
                        <input type="text" class="form-control" name="couleur" id="couleur" placeholder="Couleur*" required>
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">
                    <div class="col-md-5 d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark mt-3 " name="ajouterVoiture" style="color: #57F2AA;">Ajouter un voiture</button>
                    </div>
                </div>
            </form>
            <h3 style="color: #57F2AA; font-weight: bold; font-size: 2rem;" >Mes voitures</h3>
            <table class="custom-table">
                <tr>
                    <th>Modèle</th>
                    <th>Immatriculation</th>
                    <th>Énergie</th>
                    <th>Couleur</th>
                    <th>Date d'immatriculation</th>
                    <th class="text-center">Actions</th>
                </tr>
                <?php foreach ($voitures as $voiture) : ?>
                    <tr>
                        <td><?= $voiture['modele']; ?></td>
                        <td><?= $voiture['immatriculation']; ?></td>
                        <td><?= $voiture['energie']; ?></td>
                        <td><?= $voiture['couleur']; ?></td>
                        <td><?= $voiture['date_immatriculation']; ?></td>
                        <td>
                            <a class="btn btn-warning text-white" href="index.php?page=editVoitures&id=<?= $voiture['voiture_id']; ?>">Modifier</a>
                            <a class="btn btn-danger" href="backend/controllers/voitureController.php?delete=<?= $voiture['voiture_id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php if (isset($_SESSION['message'])): ?>
                <script type="text/javascript">
                    alert("<?= $_SESSION['message']; ?>");
                </script>
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
        </div>
    </div>
</div>