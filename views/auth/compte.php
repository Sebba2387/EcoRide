<div class="container d-flex flex-column justify-content-center mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10 col-10">
            <div class="p-4 shadow-sm rounded" style="background-color: #F2F2F2;">
                <form class="p-3 text-center rounded">
                    <h2 class="fw-bold" style="color: #57F2AA;">Leina DUPONT</h2>
                    <!-- Champs "identité" -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-3 py-2">
                            <input type="number" class="form-control" id="age" placeholder="Âge*" required>
                        </div>
                        <div class="col-md-3 py-2">
                            <input type="email" class="form-control" id="email" placeholder="Email*" required>
                        </div>
                        <div class="col-md-3 py-2">
                            <input type="password" class="form-control" id="mdp" placeholder="*********" required>
                        </div>
                        <div class="col-md-3 py-2">
                            <input type="tel" class="form-control" id="telephone" placeholder="Téléphone" required>
                        </div>
                    </div>
                    <!-- Champs "Permis"-->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-3 py-2">
                            <input type="text" class="form-control" id="adresse" placeholder="Adresse*" required>
                        </div>
                        <div class="col-md-3 py-2">
                            <input type="text" class="form-control" id="permis" placeholder="type de permis" required>
                        </div>
                        <div class="col-md-3 py-2">
                            <input type="date" class="form-control" id="permisDate" placeholder="Date de permis" required>
                        </div>
                        <div class="col-md-3 py-2">
                            <input type="number" class="form-control" id="numeroPermis" placeholder="Numéro de permis" required>
                        </div>
                    </div>
                    <!-- Champs "Permis"-->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-10 py-2 mb-2">
                            <a href="/editPassword">Modifier le mot de passe ?</a>
                        </div>
                        <div class="col-md-10 py-2 mb-2">
                            <textarea class="form-control w-100" rows="4" id="message" placeholder="Votre message" aria-describedby="message-addon"></textarea>
                        </div>
                    </div>
                    <!-- Champ de sélection "Genre" et "Cigarette" côte à côte -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="genre" required>
                                <option selected disabled>Genre</option>
                                <option value="1">Homme</option>
                                <option value="2">Femme</option>
                                <option value="3">Non spécifié</option>
                            </select>
                        </div>
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="cigarette" required>
                                <option selected disabled>Êtes-vous fumeur ?</option>
                                <option value="1">Les fumeurs sont les bienvenus, aucune gêne pour moi.</option>
                                <option value="2">Je préfère éviter, mais fumer avant ou pendant les pauses est possible.</option>
                                <option value="3">Je ne tolère pas l'odeur de cigarette dans la voiture.</option>
                            </select>
                        </div>
                    <!-- Champ de sélection "Musique" et "Silence" côte à côte -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="musique" required>
                                <option selected disabled>Voyagez-vous en musique ?</option>
                                <option value="1">Je suis ouverte à tous les styles musicaux, ambiance garantie !</option>
                                <option value="2">Un peu de musique, c'est sympa, mais à volume modéré.</option>
                                <option value="3">Je préfère un trajet calme, sans musique.</option>
                            </select>
                        </div>
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="silence" required>
                                <option selected disabled>Voyagez-vous en silence ?</option>
                                <option value="1">J'apprécie de discuter pendant le trajet, n'hésitez pas à engager la conversation !</option>
                                <option value="2">Je tolère les pauses silencieuses, mais je suis ouvert aux discussions légères.</option>
                                <option value="3">Je préfère voyager en silence, sans conversation.</option>
                            </select>
                        </div>
                    </div>
                    <!-- Champ de sélection "Animaux" et "Préférence passager" côte à côte -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="aniamux" required>
                                <option selected disabled>Êtes-vous ami des animaux ?</option>
                                <option value="1">Les animaux sont les bienvenus à bord, je les adore !</option>
                                <option value="2">Animaux acceptés si bien installés et propres.</option>
                                <option value="3">Je ne peux pas accepter d'animaux dans ma voiture.</option>
                            </select>
                        </div>
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="passager_preference" required>
                                <option selected disabled>Préférez-vous voyager entre femmes ?</option>
                                <option value="1">Oui</option>
                                <option value="2">Non</option>
                            </select>
                        </div>
                        <div class="col-md-5 py-2">
                            <button type="submit" class="btn btn-dark mt-3 py-2" style="color: #57F2AA;">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>