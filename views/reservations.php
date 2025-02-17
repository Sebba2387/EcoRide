<?php
// Connexion à la base de données et récupération des covoiturages
require_once '/home/ecoriders/backend/database/db.php';
require_once '/home/ecoriders/backend/models/reservationModel.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$reservation = new Reservation($conn);
$utilisateur_id = $_SESSION['utilisateur_id'];

$query = "SELECT r.reservation_id, r.statut, c.covoiturage_id, c.lieu_depart, c.lieu_arrivee, c.date_arrivee, c.utilisateur_id AS createur_id 
          FROM reservation r
          JOIN covoiturage c ON r.covoiturage_id = c.covoiturage_id
          WHERE r.utilisateur_id = ? OR c.utilisateur_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $utilisateur_id, $utilisateur_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container d-flex flex-column offset-md-1 mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-12 offset-md-2 mt-5 mb-1 offset-md-1 shadow-sm rounded" style="background-color: #F2F2F2;">
            <table class="custom-table">
                <tr>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>

                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['lieu_depart']) ?></td>
                        <td><?= htmlspecialchars($row['lieu_arrivee']) ?></td>
                        <td><?= htmlspecialchars($row['date_arrivee']) ?></td>
                        <td><?= htmlspecialchars($row['statut']) ?></td>
                        <td>
                            <?php 
                                $statut = trim(strtolower($row['statut'])); 
                                $isCreateur = isset($row['createur_id']) && $row['createur_id'] == $utilisateur_id;

                                // Vérification si un avis existe déjà
                                $checkAvisQuery = "SELECT avis_id FROM avis WHERE covoiturage_id = ? AND utilisateur_id = ?";
                                $checkStmt = $conn->prepare($checkAvisQuery);
                                $checkStmt->bind_param("ii", $row['covoiturage_id'], $utilisateur_id);
                                $checkStmt->execute();
                                $checkStmt->store_result();
                                $avisExists = $checkStmt->num_rows > 0;
                                $checkStmt->close();
                            ?>

                            <?php if ($statut === 'en attente'): ?>
                                <?php if ($isCreateur): ?>
                                    <a href="/loads/book.php?accepter=<?= $row['reservation_id'] ?>" class="btn btn-success">Accepter</a>
                                    <a href="/loads/book.php?refuser=<?= $row['reservation_id'] ?>" class="btn btn-danger">Refuser</a>
                                <?php else: ?>
                                    <a href="/loads/book.php?annuler=<?= $row['reservation_id'] ?>" class="btn btn-warning">Annuler</a>
                                <?php endif; ?>
                            <?php elseif ($statut === 'acceptée' && !$avisExists): ?>
                                <a href="javascript:void(0);" onclick="ouvrirBoiteAvis(<?= $row['reservation_id'] ?>, <?= $row['covoiturage_id'] ?>)" class="btn btn-dark text-primary">Terminer</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</div>
<!-- MODAL POUR DONNER UN AVIS -->
<div id="modal-avis" class="modal">
    <div class="modal-content p-4 rounded-3" style="background-color: #F2F2F2;">
        <button type="button" class="btn btn-outline-danger mb-3" onclick="fermerBoiteAvis()">Fermer</button>
        <h5 class="text-center text-dark mb-2">Comment s'est passé ton trajet ?</h5>
        <form action="/loads/comments.php" method="POST">
            <!-- Champs cachés -->
            <input type="hidden" name="reservation_id" id="reservation_id">
            <input type="hidden" name="covoiturage_id" id="covoiturage_id">
            <!-- Champ de saisie -->
            <textarea name="commentaire" id="commentaire" class="form-control mb-3 w-100 h-auto" style="min-height: 150px;" placeholder="Écrivez votre commentaire ici..." required></textarea>
            <!-- Sélecteur de note avec des étoiles -->
            <select name="note" id="note" class="form-select mb-3" required>
                <option value="1">⭐ Mauvais</option>
                <option value="2">⭐⭐ Passable</option>
                <option value="3">⭐⭐⭐ Moyen</option>
                <option value="4">⭐⭐⭐⭐ Bien</option>
                <option value="5" selected>⭐⭐⭐⭐⭐ Excellent</option>
            </select>
            <!-- Bouton publier avec couleur personnalisée -->
            <button type="submit" class="btn btn-outline-primary text-dark w-100" >Publier</button>
        </form>
    </div>
</div>


<script src="/EcoRide/js/script.js"></script>

</body>
</html>