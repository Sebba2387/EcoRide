<div class="container mt-5">
    <div class="row d-flex align-items-center mb-5">
        <!-- Colonne gauche : Texte -->
        <div class="col-md-6 text-center text-md-start">
            <h2 class="fw-bold" style="color: #57F2AA;">Devenez EcoRider !</h2>
            <p class="text-dark fst-italic" style="text-align: justify">
                Profitez de trajets partagés, réduisez votre empreinte carbone et économisez.<br>Inscrivez-vous dès maintenant et faites un geste pour la planète !
            </p>
            <a href="/signin">Avez-vous déjà un compte ? Connectez-vous ici</a>
            <div class="container mt-2">
                <form class="p-3 border border-2 border-primary bg-primary rounded" id="SignupForm">
                    <!-- Champs "Nom" et "Prénom" côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-6 py-2">
                            <input type="text" class="form-control" id="NomInput" placeholder="Nom*" required>
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="text" class="form-control" id="PrenomInput" placeholder="Prénom*" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 py-2">
                            <input type="tel" class="form-control" id="TelephoneInput" placeholder="Téléphone">
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="number" class="form-control" id="AgeInput" placeholder="Âge">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 py-2">
                            <input type="email" class="form-control" id="EmailInput" placeholder="Email*" required>
                            <div class="invalid-feedback">
                                Le mail n'est pas au bon format
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="email" class="form-control" id="EmailInputConfirm" placeholder="Confirmez votre email*" required>
                            <div class="invalid-feedback">
                                La confirmation n'est identique au mail
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 py-2">
                            <input type="password" class="form-control" id="PasswordInput" placeholder="Mot de passe*" required>
                            <div class="invalid-feedback">
                                Le mot de pass n'est pas assez robuste : Au moins 8 caractères, comprenant au moins 1 lettre en majescule, 1 miniscule, 1 chiffre, 1 caractère spécial
                            </div>
                            <div class ="valid-feedback">
                                Le mot de passe est robuste
                            </div>
                        </div>
                        <div class="col-md-6 py-2">
                            <input type="password" class="form-control" id="PasswordInputConfirm" placeholder="Confirmez votre mot de passe*" required>
                            <div class="invalid-feedback">
                                La confirmation n'est identique pas au mot de passe
                            </div>
                        </div>
                    </div>
                    <!-- Champ de texte pour message -->
                    <div class="mb-2 py-3">
                        <textarea class="form-control" id="PresentationInput" rows="4" placeholder="Présentez-vous..."></textarea>
                    </div>
                    <!-- Champ de sélection Genre-->
                    <div class="mb-2 py-2">
                        <select class="form-select" id="GenreInput">
                            <option selected disabled>Choisissez votre genre</option>
                            <option value="1">Homme</option>
                            <option value="2">Femme</option>
                            <option value="3">Non spécifié</option>
                        </select>
                    </div>
                    <!-- Champ de sélection Cigarette-->
                    <div class="mb-2 py-2">
                        <select class="form-select" id="CigaretteInput">
                            <option selected disabled>Êtes-vous fumeur ?</option>
                            <option value="1">Les fumeurs sont les bienvenus, aucune gêne pour moi.</option>
                            <option value="2">Je préfère éviter, mais fumer avant ou pendant les pauses est possible.</option>
                            <option value="3">Je ne tolère pas l'odeur de cigarette dans la voiture.</option>
                        </select>
                    </div>
                    <!-- Champ de sélection Musique-->
                    <div class="mb-2 py-2">
                        <select class="form-select" id="MusiqueInput">
                            <option selected disabled>Voyagez-vous en musique ?</option>
                            <option value="1">Je suis ouverte à tous les styles musicaux, ambiance garantie !</option>
                            <option value="2">Un peu de musique, c'est sympa, mais à volume modéré.</option>
                            <option value="3">Je préfère un trajet calme, sans musique.</option>
                        </select>
                    </div>
                    <!-- Champ de sélection Silence-->
                    <div class="mb-2 py-2">
                        <select class="form-select" id="SilenceInput">
                            <option selected disabled>Voyagez-vous en silence ?</option>
                            <option value="1">J'apprécie de discuter pendant le trajet, n'hésitez pas à engager la conversation !</option>
                            <option value="2">Je tolère les pauses silencieuses, mais je suis ouvert aux discussions légères.</option>
                            <option value="3">Je préfère voyager en silence, sans conversation.</option>
                        </select>
                    </div>
                    <!-- Champ de sélection Animaux-->
                    <div class="mb-2 py-2">
                        <select class="form-select" id="AnimauxInput" >
                            <option selected disabled>Êtes-vous ami des animaux ?</option>
                            <option value="1">Les animaux sont les bienvenus à bord, je les adore !</option>
                            <option value="2">Animaux acceptés si bien installés et propres.</option>
                            <option value="3">Je ne peux pas accepter d'animaux dans ma voiture.</option>
                        </select>
                    </div>
                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn btn-dark w-100 mt-3 py-2" id="SignupBtn" style="color: #57F2AA;">Inscription</button>
                </form>
            </div>
        </div>
        
        <!-- Colonne droite : Image -->
        <div class="col-md-6 text-center">
            <img src="images/img_inscription.png" alt="Image" class="img-fluid">
        </div>
    </div>
</div>