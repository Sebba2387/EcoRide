<?php
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['error'])) {
    echo "<p style='color: red'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<p style='color: green'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}
?>
<div class="container d-flex flex-column justify-content-center mt-5">
    <!-- Bloc Formulaire de connexion -->
    <div class="row justify-content-center mb-4 mt-5">
        <div class="col-md-4 col-12">
            <div class="bg-primary p-4 shadow-sm rounded">
                <form action="/loads/backend_loader.php" method="POST">
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="ancienPassword-icon"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" name="ancien_mdp" id="ancienPassword" placeholder="Ancien mot de passe" aria-describedby="ancienPassword-icon" required>
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="nouveauPassword-icon"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" name="nouveau_mdp" id="nouveauPassword" placeholder="Nouveau mot de passe" aria-describedby="nouveauPassword-icon" required>
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="confirmPassword-icon"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" name="confirmation_mdp" id="confirmPassword" placeholder="Confirmation du nouveau mot de passe" aria-describedby="confirmPassword-icon" required>
                    </div>
                    <button type="submit" name="modifier_mdp" class="btn btn-dark w-100 mt-2" id="editPasswordBtn"  style="color: #57F2AA;">Modifier</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bloc Image aligné sous le formulaire -->
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <img src="assets/images/img_editPassword.jpg" alt="Image de connexion" class="img-fluid">
        </div>
    </div>
</div>
<!-- <script src="js/auth/editPassword.js"></script> -->