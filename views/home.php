<?php 
require_once 'backend/controllers/covoiturageController.php'; 

// Vérifier si le bouton a été cliqué
$afficherTableau = isset($_POST['afficher_tableau']) ? true : false;
?>
<div class="container mt-5">
    <!-- Texte aligné -->
    <div class="my-4 text-center">
        <h1 class="text-primary fw-bold">Voyagez vert, partagez mieux !</h1>
        <h6>Facilitez vos trajets, réduisez votre impact écologique. Covoiturez pour un avenir durable !</h6>
    </div>
    <!-- Formulaire barre de recherche responsive -->
    <div class="container d-flex justify-content-center align-items-center">
        <form class="p-3 border border-2 border-primary bg-primary rounded w-100 w-md-100" method="POST">
            <div class="d-flex flex-column flex-md-row gap-2 w-100">
                <div class="input-group">
                    <span class="input-group-text bg-white" ><i class="bi bi-geo-alt-fill" style="color: #213A40;"></i></span>
                    <input type="text" class="form-control flex-grow-1" placeholder="Départ" name="lieu_depart">
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-geo-alt-fill" style="color: #213A40;"></i></span>
                    <input type="text" class="form-control flex-grow-1" placeholder="Destination" name="lieu_arrivee">
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-calendar-week" style="color: #213A40;"></i></span>
                    <input type="date" class="form-control flex-grow-1" placeholder="Date" name="date_depart">
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-people-fill" style="color: #213A40;"></i></span>
                    <input type="number" min="1" class="form-control flex-grow-1" placeholder="Passagers" name="nombre_places">
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-people-fill" style="color: #213A40;"></i></span>
                    <input type="text" min="1" class="form-control flex-grow-1" placeholder="Énergie" name="energie">
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-people-fill" style="color: #213A40;"></i></span>
                    <input type="number" min="1" class="form-control flex-grow-1" placeholder="Note min." name="note">
                </div>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-people-fill" style="color: #213A40;"></i></span>
                    <input type="number" min="1" class="form-control flex-grow-1" placeholder="Prix max." name="prix">
                </div>
                <button type="submit" class="btn btn-dark w-100" name="afficher_tableau" style="color: #57F2AA;">Top départ !</button>
            </div>
        </form>
    </div>
    <!-- Affichage du tableau si le bouton a été cliqué -->
    <?php if ($afficherTableau) : ?>
    <div class="container d-flex justify-content-center align-items-center" style="display: none;">
        <?php if (!empty($covoiturages)) : ?>
        <table class="custom-table">
            <tr>
                <th>Pseudo</th>
                <th>Départ</th>
                <th>Arrivée</th>
                <th>Date</th>
                <th>Places</th>
                <th>Durée</th>
                <th>Énergie</th>
                <th>Note</th>
                <th>Prix</th>
                <th>Action</th>
            </tr>
            <?php foreach ($covoiturages as $covoiturage) : ?>
                <tr>
                    <td><?= htmlspecialchars($covoiturage['pseudo']) ?></td>
                    <td><?= htmlspecialchars($covoiturage['lieu_depart']) ?></td>
                    <td><?= htmlspecialchars($covoiturage['lieu_arrivee']) ?></td>
                    <td><?= htmlspecialchars($covoiturage['date_depart']) ?></td>
                    <td><?= htmlspecialchars($covoiturage['nombre_places']) ?></td>
                    <td><?= htmlspecialchars($covoiturage['duree']) ?>h</td>
                    <td><?= htmlspecialchars($covoiturage['energie']) ?></td>
                    <td><?= number_format($covoiturage['note_moy'] ?? 0, 1) ?> ⭐</td>
                    <td><?= htmlspecialchars($covoiturage['prix']) ?>€</td>
                    <td>
                    <form action="backend/controllers/reservationController.php" method='POST'>
                        <input type='hidden' name='covoiturage_id' value="<?php echo $covoiturage['covoiturage_id']; ?>">
                        <button type='submit' name='reserver' class='btn btn-success'>Réserver</button>
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <h6 class="text-primary mt-5">Aucun covoiturage trouvé pour votre trajet. Restez à l'affût ! 🚗</h6>
    <?php endif; ?>
    </div>
<?php endif; ?>
    <!-- Image centrée -->
    <div class="container-fluid text-center mt-2">
        <img src="images/img_accueil.jpg" alt="Image centrée" class="img-fluid" style="max-width: 100%; max-height: 400px;">
    </div>
</div> 