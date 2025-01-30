<div class="container d-flex flex-column justify-content-center mt-5">
    <!-- Bloc Formulaire de connexion -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-4 col-12">
            <div class="bg-primary p-4 shadow-sm rounded">
                <form>
                    <!-- Champ Email avec icône -->
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="email-icon"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" id="EmailInput" placeholder="Entrez votre email" aria-describedby="email-icon" required>
                    </div>
                    <!-- Champ Mot de passe avec icône -->
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="password-icon"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="PasswordInput" placeholder="Entrez votre mot de passe" aria-describedby="password-icon" required>
                        <div class="invalid-feedback">
                            Le mail et le mot de passe ne correspondent pas 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mt-2" id="btnSignin"  style="color: #57F2AA;">Connexion</button>
                    <div class="mb-3 mt-1 input-group">
                        <a href="/signup" class="text-dark">Vous n'avez pas de compte ? Inscrivez-vous ici</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bloc Image aligné sous le formulaire -->
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <img src="images/img_connexion.jpg" alt="Image de connexion" class="img-fluid">
        </div>
    </div>
</div>