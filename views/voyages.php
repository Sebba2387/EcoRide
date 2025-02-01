<div class="container d-flex flex-column justify-content-center mt-5">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10 col-10 mt-5 mb-5">
            <div class="offset-md-3 p-4 shadow-sm rounded" style="background-color: #F2F2F2;">
                <form class="p-3 text-center rounded">
                    <!-- Champs "Ville Départ" et "Ville Arrivée" côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-4 py-2">
                            <input type="text" class="form-control" id="depart" placeholder="Départ*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <input type="text" class="form-control" id="arrivee" placeholder="Arrivée*" required>
                        </div>
                    </div>
                    <!-- Champs "Date Départ" et "Heure Départ" côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-4 py-2">
                            <input type="date" class="form-control" id="dateDepart" placeholder="Date de départ*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <input type="time" class="form-control" id="heureDepart" placeholder="Heure de départ*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <button type="submit" class="btn btn-dark w-50 mt-3 py-2" style="color: #57F2AA;">Publier</button>
                        </div>
                    </div>
                    <!-- Champs "prix" et "nombre de place" côte à côte -->
                    <div class="row mb-2">
                        <div class="col-md-4 py-2">
                            <input type="number" class="form-control" id="prixUnitaire" placeholder="Prix unitaire*" required>
                        </div>
                        <div class="col-md-4 py-2">
                            <input type="number" class="form-control" id="nombrePlaces" placeholder="Nombre de places*" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
