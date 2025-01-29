<div class="container d-flex flex-column justify-content-center mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10 col-10">
            <div class="p-4 shadow-sm rounded" style="background-color: #F2F2F2;">
                <form class="p-3 text-center rounded">
                    <!-- Champs "Modèle" et "Année" côte à côte / photo -->
                    <div class="row mb-2">
                        <div class="col-md-3 ml-1">
                            <img src="/images/img_voiture_1.png" class="rounded-5 d-none d-md-block ms-1" alt="Profil" style="max-width: 100% ; max-height: 150px;">
                        </div>
                        <div class="col-md-3 ml-1">
                            <img src="/images/img_voiture_2.png" class="rounded-5 d-none d-md-block ms-1" alt="Profil" style="max-width: 100% ; max-height: 150px;">
                        </div>
                        <div class="col-md-3 ml-1">
                            <img src="/images/img_voiture_3.png" class="rounded-5 d-none d-md-block ms-1" alt="Profil" style="max-width: 100% ; max-height: 150px;">
                        </div>
                        <div class="col-md-3 ml-1">
                            <img src="/images/img_voiture_4.png" class="rounded-5 d-none d-md-block ms-1" alt="Profil" style="max-width: 100% ; max-height: 150px;">
                        </div>
                    </div>
                    <!-- Champs "Modèle" et "Année" côte à côte / photo -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <input type="text" class="form-control" id="modele" placeholder="Modèle*" required>
                        </div>
                        <div class="col-md-5 py-2">
                            <input type="text" class="form-control" id="annee" placeholder="Année*" required>
                        </div>
                    </div>
                    <!-- Champs "Immatriculation" et "Couleur" côte à côte -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <input type="text" class="form-control" id="immatriculation" placeholder="Immatriculation*" required>
                        </div>
                        <div class="col-md-5 py-2">
                            <input type="text" class="form-control" id="couleur" placeholder="Couleur*" required>
                        </div>
                    </div>
                    <!-- Champs "Consommation (L/100km)" et "Émissions de CO2 (g/km)" côte à côte -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <input type="text" class="form-control" id="consommation" placeholder="Consommation (L/100km)" required>
                        </div>
                        <div class="col-md-5 py-2">
                            <input type="text" class="form-control" id="emissions" placeholder="Émissions de CO2 (g/km)" required>
                        </div>
                    </div>
                    <!-- Champ de sélection "Energies" et "nb places" côte à côte -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="energies" required>
                                <option selected disabled>Type d'énergie*</option>
                                <option value="1">Électrique</option>
                                <option value="2">Hybride</option>
                                <option value="3">Essence</option>
                                <option value="4">Diesel</option>
                                <option value="5">Gaz</option>
                            </select>
                        </div>
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="places" required>
                                <option selected disabled>Places disponibles*</option>
                                <option value="1">1 place</option>
                                <option value="2">2 places</option>
                                <option value="3">3 places</option>
                                <option value="4">4 places</option>
                            </select>
                        </div>
                    </div>
                    <!-- Champ de sélection "Climatisation" et "PMR" côte à côte -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="climatisation" required>
                                <option selected disabled>Climatisation*</option>
                                <option value="1">Oui</option>
                                <option value="2">Non</option>
                            </select>
                        </div>
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="pmr" required>
                                <option selected disabled>Accés PMR*</option>
                                <option value="1">Oui</option>
                                <option value="2">Non</option>
                            </select>
                        </div>
                    </div>
                    <!-- Champ de sélection "Bagages" et "Vélos" côte à côte -->
                    <div class="row mb-2 justify-content-center">
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="bagages" required>
                                <option selected disabled>Porte bagages</option>
                                <option value="1">Oui</option>
                                <option value="2">Non</option>
                            </select>
                        </div>
                        <div class="col-md-5 py-2">
                            <select class="form-select" id="velos" required>
                                <option selected disabled>Porte vélos</option>
                                <option value="1">Oui</option>
                                <option value="2">Non</option>
                            </select>
                        </div>
                    </div>
                    <!-- Bouton de soumission -->
                    <div class="col-md-5 py-2">
                        <button type="submit" class="btn btn-dark mt-3 py-2" style="color: #57F2AA;">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="col-md-5 py-2">
                <button class="btn btn-primary text-white mt-3 py-2">Ajouter une voiture</button>
            </div>
        </div>
    </div>
    <!-- Bloc Image aligné sous le formulaire -->
    <div class="row justify-content-center">
        <div class="col-md-6 col-6">
            <img src="/images/img_profil.jpg" alt="Image de connexion" class="img-fluid" style="max-width: 100%; max-height: 400px;">
        </div>
    </div>
</div>