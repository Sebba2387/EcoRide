<div class="container mt-5">
    <div class="row d-flex align-items-center">
        <!-- Colonne gauche : Texte -->
        <div class="col-md-6 mt-3 text-center text-md-start">
            <h2 class="fw-bold" style="color: #57F2AA;">Contactez nous</h2>
            <p class="text-dark fst-italic" style="text-align: justify">
                Une question, une suggestion ou besoin d'aide ? N'hésitez pas à nous écrire, notre équipe est là pour vous accompagner !
            </p>
            <div class="container mt-3 mb-3">
                <form class="p-3 border border-2 border-primary bg-primary rounded">
                    <!-- Champs "Nom" et "Prénom" côte à côte -->
                    <div class="row mb-3">
                        <div class="col-md-6 py-3">
                            <input type="text" class="form-control" id="nom" placeholder="Nom*" required>
                        </div>
                        <div class="col-md-6 py-3">
                            <input type="email" class="form-control" id="email" placeholder="Email*" required>
                        </div>
                    </div>
                    <!-- Champ de sélection -->
                    <div class="mb-3 py-3">
                        <select class="form-select" id="typeDemande" required>
                            <option selected disabled>Type de demander</option>
                            <option value="1">Demande de renseignement</option>
                            <option value="2">Réclamation</option>
                            <option value="3">suggestion</option>
                            <option value="4">Autre</option>
                        </select>
                    </div>
                    <!-- Champ de texte pour message -->
                    <div class="mb-3 py-3">
                        <textarea class="form-control" id="message" rows="6" placeholder="Votre message..." required></textarea>
                    </div>
                    <!-- Bouton de soumission -->
                    <button type="submit" class="btn btn-dark w-100" style="color: #57F2AA;">Envoyer</button>
                </form>
            </div>
        </div>
        
        <!-- Colonne droite : Image -->
        <div class="col-md-6 text-center">
            <img src="images/img_contact.jpg" alt="Image" class="img-fluid">
        </div>
    </div>
</div>