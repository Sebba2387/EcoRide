<?php 
require_once 'backend/controllers/userController.php'; 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vérifier si le bouton a été cliqué
$afficherTableau = isset($_POST['afficher_tableau']) ? true : false;
?>
<div class="container mt-5">
    <!-- Texte aligné -->
    <div class="my-4 text-center mt-5">
        <h3 class="text-primary fw-bold">EcoRide.Admin</h3>
    </div>
    <!-- Formulaire barre de recherche responsive -->
    <div class="container d-flex justify-content-center align-items-center">
        <form class="p-3 border border-2 border-primary bg-primary rounded w-100 w-md-100" method="POST">
            <div class="d-flex flex-column flex-md-row gap-2 w-100">
                <div class="input-group">
                    <input type="text" class="form-control flex-grow-1" placeholder="Nom" name="nom">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control flex-grow-1" placeholder="Prénom" name="prenom">
                </div>
                <div class="input-group">
                    <input type="email" class="form-control flex-grow-1" placeholder="Email" name="email">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control flex-grow-1" placeholder="Pseudo" name="pseudo">
                </div>
                <button type="submit" class="btn btn-dark w-100" name="afficher_tableau" style="color: #57F2AA;">Rechercher</button>
            </div>
        </form>
    </div>
    <!-- Affichage du tableau si le bouton a été cliqué -->
    <?php if (isset($_SESSION['message'])): ?>
        <p><?= $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>
    <?php if ($afficherTableau) : ?>
    <div class="container d-flex justify-content-center align-items-center" style="display: none;">
        <?php if (!empty($utilisateurs)) : ?>
        <table class="custom-table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Pseudo</th>
                <th>Action</th>
            </tr>
            <?php foreach ($utilisateurs as $user) : ?>
                <tr>
                    <td><?= htmlspecialchars($user['utilisateur_id']) ?></td>
                    <td><?= htmlspecialchars($user['nom']) ?></td>
                    <td><?= htmlspecialchars($user['prenom']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['pseudo']) ?></td>
                    <td>
                    <form method="POST" action="backend/controllers/userController.php" onsubmit="return confirm('Confirmer la suppression ?');">
                        <input type="hidden" name="utilisateur_id" value="<?= $user['utilisateur_id']; ?>">
                        <button  type="submit" name="supprimer_utilisateur" class="btn btn-danger" style="background-color: #D9534F !important;">Supprimer</button>
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <h6 class="text-dark mt-5">Aucun utilisateur trouvé ! 🙁</h6>
    <?php endif; ?>
    </div>
<?php endif; ?>
</div> 