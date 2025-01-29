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
                        <div class="invalid-feedback">
                            Le mail n'est pas au bon format
                        </div>
                    </div>
                    <!-- Champ Mot de passe avec icône -->
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="password-icon"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="PasswordInput" placeholder="Entrez votre mot de passe" aria-describedby="password-icon" required>
                        <div class="invalid-feedback">
                            Le mot de pass n'est pas assez robuste : Au moins 8 caractères, comprenant au moins 1 lettre en majescule, 1 miniscule, 1 chiffre, 1 caractère spécial
                        </div>
                        <div class ="valid-feedback">
                            Le mot de passe est robuste
                        </div>
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="password-icon"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="PasswordInputConf" placeholder="Entrez votre mot de passe" aria-describedby="password-icon" required>
                        <div class="invalid-feedback">
                            La confirmation n'est identique pas au mot de passe
                        </div>
                        <div class="valid-feedback">
                            La confirmation est identique au mot de passe
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mt-2" id="editPasswordBtn"  style="color: #57F2AA;">Valider</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bloc Image aligné sous le formulaire -->
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <img src="/images/img_editPassword.jpg" alt="Image de connexion" class="img-fluid">
        </div>
    </div>
</div>