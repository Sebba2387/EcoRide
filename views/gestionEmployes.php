<?php 
require_once __DIR__ . '/../backend/controllers/employeController.php'; 

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
    <div class="container d-flex justify-content-center align-items-center mt-3">
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
                    <input type="password" class="form-control flex-grow-1" placeholder="Mot de passe" name="password">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control flex-grow-1" placeholder="Pseudo" name="pseudo">
                </div>
                <button type="submit" class="btn btn-dark w-100" name="ajouter_employe" style="color: #57F2AA;"><i class="bi bi-plus-square"></i>  Ajouter</button>
            </div>
        </form>
    </div>
    <!-- Formulaire barre de recherche responsive -->
    <div class="container d-flex justify-content-center align-items-center mt-3">
        <form class="p-3 border border-2 border-primary bg-primary rounded w-100 w-md-100" method="POST">
            <div class="d-flex flex-column flex-md-row gap-2 w-100">
                <div class="input-group">
                    <input type="text" class="form-control flex-grow-1" placeholder="ID" name="utilisateur_id">
                </div>
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
                <button type="submit" class="btn btn-dark w-100" name="afficher_tableau" style="color: #57F2AA;"><i class="bi bi-search"></i>  Rechercher</button>
            </div>
        </form>
    </div>
    <!-- Affichage du tableau si le bouton a été cliqué -->
    <?php if (isset($_SESSION['message'])): ?>
        <p><?= $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>
    <?php if ($afficherTableau) : ?>
    <div class="container d-flex justify-content-center align-items-center">
    <?php if (!empty($employes)) : ?>
        <table class="custom-table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Pseudo</th>
                <th>Action</th>
            </tr>
            <?php foreach ($employes as $employe) : ?>
                <tr>
                    <td><?= htmlspecialchars($employe['utilisateur_id'])?></td>
                    <td><?= htmlspecialchars($employe['nom']) ?></td>
                    <td><?= htmlspecialchars($employe['prenom']) ?></td>
                    <td><?= htmlspecialchars($employe['email']) ?></td>
                    <td><?= htmlspecialchars($employe['pseudo']) ?></td>
                    <td>
                    <form method="POST" action="backend/controllers/employeController.php" onsubmit="return confirm('Confirmer la suppression ?');">
                        <input type="hidden" name="utilisateur_id" value="<?= $employe['utilisateur_id']; ?>">
                        <button  type="submit" name="supprimer_employe" class="btn btn-danger" style="background-color: #D9534F !important;">Supprimer</button>
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <h6 class="text-dark mt-5">Aucun employé trouvé ! 🙁</h6>
    <?php endif; ?>
    </div>
    <?php endif; ?>
</div> 