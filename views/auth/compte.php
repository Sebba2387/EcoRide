<?php
require_once 'backend/database/db.php';  // Connexion à la base de données
require_once 'backend/models/user.php';  // Modèle User

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userModel = new User($conn);
$user = $userModel->getUserById($_SESSION['utilisateur_id']);
?>
<div class="container d-flex flex-column offset-md-2 mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10 col-10 mt-5 mb-5">
            <div class="shadow-sm rounded" style="background-color: #F2F2F2;">
                <form class="mb-5 p-3 rounded" action="backend/controllers/compteController.php" method="POST">
                    <div class="col-md-3 py-2">
                            <input type="text" class="form-control bg-transparent border-0" name="pseudo" id="pseudo" placeholder="Pseudo" style="color: #57F2AA; font-weight: bold; font-size: 2.5rem;"  value="<?= htmlspecialchars($user['pseudo'])?>" required>
                    </div>
                    <!-- Champs identité & contact -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-3 py-2">
                            <label for="nom" class="form-label text-secondary">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="nom" value="<?= htmlspecialchars($user['nom'])?>" required>
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="prenom" class="form-label text-secondary">Prénom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="prenom" value="<?= htmlspecialchars($user['prenom'])?>" required>
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="email" class="form-label text-secondary">Adresse email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?= htmlspecialchars($user['email'])?>" required>
                        </div>
                        <div class="col-md-3 py-2">
                            <label for="telephone" class="form-label text-secondary">Téléphone</label>
                            <input type="telephone" class="form-control" name="telephone" id="telephone" placeholder="Téléphone" value="<?= htmlspecialchars($user['telephone'])?>" required>
                        </div>
                    </div>
                    <!-- Champs "Permis"-->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-3 py-1">
                            <label for="adresse" class="form-label text-secondary">Adresse</label>
                            <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" value="<?= htmlspecialchars($user['adresse'])?>" required>
                        </div>
                        <div class="col-md-3 py-1">
                            <label for="date_naissance" class="form-label text-secondary">Date de naissance</label>
                            <input type="date" class="form-control" name="date_naissance" id="date_naissance" placeholder="Date de naissance" value="<?= htmlspecialchars($user['date_naissance'])?>" required>
                        </div>
                        <div class="col-md-3 py-1 d-flex">
                            <a href="index.php?page=editPassword" class="btn btn-primary fw-bold text-white rounded w-100 text-center align-self-end" >Modifier le mot de passe ?</a>
                        </div>
                    </div>
                    <div class="row mb-1 justify-content-center">
                        <div class="col-md-2 py-2 justify-content-center">
                            <button type="submit" class="btn btn-dark mt-3 py-2" name="update" style="color: #57F2AA;">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-10 col-10 text-center">
                <img src="images/img_profil.jpg" alt="Image de connexion" class="img-fluid" style="max-width: 100%; max-height: 400px;">
            </div>
        </div>
    </div>
</div>

