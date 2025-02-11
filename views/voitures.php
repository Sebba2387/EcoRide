<div class="container d-flex flex-column offset-md-1 mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-9 offset-md-2 mt-5 mb-5 offset-md-3 shadow-sm rounded" style="background-color: #F2F2F2;">
            <form id="form-compte" class="mb-5 p-3 text-center rounded">
                <!-- Champs "Modèle" et "Année" côte à côte / photo -->
                    <div class="row mb-2">
                        <div class="col-md-3 ml-1">
                            <img src="images/img_voiture_1.png" class="rounded-5 d-none d-md-block ms-1" alt="Profil" style="max-width: 100% ; max-height: 150px;">
                        </div>
                        <div class="col-md-3 ml-1">
                            <img src="images/img_voiture_2.png" class="rounded-5 d-none d-md-block ms-1" alt="Profil" style="max-width: 100% ; max-height: 150px;">
                        </div>
                        <div class="col-md-3 ml-1">
                            <img src="images/img_voiture_3.png" class="rounded-5 d-none d-md-block ms-1" alt="Profil" style="max-width: 100% ; max-height: 150px;">
                        </div>
                        <div class="col-md-3 ml-1">
                            <img src="images/img_voiture_4.png" class="rounded-5 d-none d-md-block ms-1" alt="Profil" style="max-width: 100% ; max-height: 150px;">
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
                                <input type="text" class="form-control" id="immatriculationDate" placeholder="Date première immatriculation*" required>
                            </div>
                        </div>
                        <!-- Champs "Consommation (L/100km)" et "Émissions de CO2 (g/km)" côte à côte -->
                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-5 py-2">
                                <input type="text" class="form-control" id="energie" placeholder="Énergie*" required>
                            </div>
                            <div class="col-md-5 py-2">
                                <input type="text" class="form-control" id="couleur" placeholder="Couleur*" required>
                            </div>
                        </div>
                        <!-- Bouton de soumission -->
                        <div class="col-md-5 py-2 justify-content-center">
                            <button type="submit" class="btn btn-dark mt-3 py-2" style="color: #57F2AA;">Enregistrer</button>
                        </div>
                    </form>
        </div>
        <div class="col-md-5 center-text py-2">
            <button class="btn btn-primary text-white mt-3 py-2">Ajouter une voiture</button>
        </div>
    </div>
</div>