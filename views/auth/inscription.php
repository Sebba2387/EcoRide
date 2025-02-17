<div class="container mt-3 mb-3">
    <div class="row d-flex align-items-center mb-2">
        <!-- Colonne gauche : Texte -->
        <div class="col-md-6 text-center text-md-start mt-3">
            <h2 class="fw-bold mt-5" style="color: #57F2AA;">Devenez EcoRider !</h2>
            <p class="text-dark fst-italic" style="text-align: justify">
                Profitez de trajets partagés, réduisez votre empreinte carbone et économisez.<br>Inscrivez-vous dès maintenant et faites un geste pour la planète !
            </p>
            <a href="index.php?page=signin">Déjà inscrit ? Connectez-vous ici</a>
            <div class="container mt-2">
                <form class="p-3 border border-2 border-primary bg-primary rounded" id="SignupForm" action="loads/signup.php" method="POST">
                    <!-- Champs "Nom" et "Prénom" côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-6 py-2">
                            <input type="text" class="form-control" name="nom" id="NomInput" placeholder="Nom*" required>
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="text" class="form-control" name="prenom" id="PrenomInput" placeholder="Prénom*" required>
                        </div>
                    </div>
                    <!-- Champs "Mail" et "Confirmation mail" côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-6 py-2">
                            <input type="email" class="form-control" name="email" id="EmailInput" placeholder="Email*" required>
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="text" class="form-control" name="pseudo" id="PseudoInput" placeholder="Pseudo" required>
                        </div>
                    </div>
                    <!-- Champs "Mot de passe" et "Confirmation mot de passe" côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-6 py-2">
                            <input type="password" class="form-control"  name="password" id="PasswordInput" placeholder="Mot de passe*" required>
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="password" class="form-control" id="PasswordInputConfirm" placeholder="Confirmez votre mot de passe*" required>
                        </div>
                    </div>
                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn btn-dark w-100 mt-3 py-2" name="ajouter_utilisateur" id="SignupBtn" style="color: #57F2AA;">Inscription</button>
                </form>
            </div>
        </div>
        
        <!-- Colonne droite : Image -->
        <div class="col-md-6 text-center">
            <img src="assets/images/img_inscription.png" alt="Image" class="img-fluid">
        </div>
    </div>
</div>
<!-- <script src="js/auth/signup.js"></script> -->