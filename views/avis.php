<?php
// Connexion à la base de données et récupération des covoiturages
require_once __DIR__ . '/../backend/database/db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vérification sécurisée
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: /EcoRide/index.php?page=signin");
    exit();
}

$utilisateur_id = $_SESSION['utilisateur_id'];

// Récupérer l'ordre de tri depuis l'URL (ASC par défaut)
$tri = isset($_GET['tri']) && $_GET['tri'] === 'desc' ? 'DESC' : 'ASC';
$nouveau_tri = $tri === 'ASC' ? 'desc' : 'asc';  // Alterne le tri

// Requête SQL pour récupérer les avis des covoiturages auxquels l'utilisateur a participé
$query = "
    SELECT 
        a.avis_id, 
        c.covoiturage_id, 
        c.lieu_depart, 
        c.lieu_arrivee, 
        u.pseudo, 
        a.commentaire, 
        a.note, 
        a.date_avis
    FROM avis a
    JOIN covoiturage c ON a.covoiturage_id = c.covoiturage_id
    JOIN utilisateur u ON a.utilisateur_id = u.utilisateur_id
    WHERE c.covoiturage_id IN (
        SELECT r.covoiturage_id FROM reservation r WHERE r.utilisateur_id = ?
        UNION
        SELECT c2.covoiturage_id FROM covoiturage c2 WHERE c2.utilisateur_id = ?
    )
    ORDER BY c.covoiturage_id $tri";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $utilisateur_id, $utilisateur_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container-fluid d-flex flex-column justify-content-center mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10 col-10 mt-5 mb-5 offset-md-1">
            <a href="?tri=<?= $nouveau_tri ?>" class="btn-sort">
                Trier par Voyage (<?= $tri === 'ASC' ? '⬆' : '⬇' ?>)
            </a>

            <table class="custom-table">
                <tr>
                    <th class="text-center">Ref du voyage</th>
                    <th class="text-center">Lieu de départ</th>
                    <th class="text-center">Lieu d'arrivée</th>
                    <th class="text-center">Utilisateur</th>
                    <th class="text-center">Commentaire</th>
                    <th class="text-center">Note</th>
                    <th class="text-center">Date</th>
                </tr>

                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    <td class="text-center"><?= htmlspecialchars($row['covoiturage_id']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['lieu_depart']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['lieu_arrivee']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['pseudo']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['commentaire']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['note']) ?> ⭐</td>
                    <td class="text-center"><?= htmlspecialchars($row['date_avis']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-6 text-center">
            <img src="assets/images/img_voyages.jpg" alt="Image de connexion" class="img-fluid" style="max-width: 100%; max-height: 400px;">
        </div>
    </div>
</div>   
