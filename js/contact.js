// Récupération des éléments concernés
const inputNom = document.getElementById("NomInput");
const inputEmail = document.getElementById("EmailInput");
const inputDemande = document.getElementById("typeDemande");
const textMessage = document.getElementById("messageText");
const btnEnvoi = document.getElementById("envoiBtn");

// Suivi des émléments concernés
inputNom.addEventListener("keyup", validateForm);
inputEmail.addEventListener("keyup", validateForm);
inputDemande.addEventListener("change", validateForm);
textMessage.addEventListener("keyup", validateForm);

// Désactiver le bouton d'envoi au chargement
btnEnvoi.disabled = true;

// Fonction de validation du formulaire
function validateForm() {
    const emailOK = validateMail(inputEmail);
    const nomOk = validateRequired(inputNom);
    const demandeOk = validateSelect(inputDemande);
    const textOk = validateRequired(textMessage);


    // Fonction d'activation du bouton d'inscriptions
    if(emailOK && nomOk && textOk && demandeOk){
        btnEnvoi.disabled = false;
    }else{
        btnEnvoi.disabled = true;
    }
}

// Fonction de vérification du mail
function validateMail(input){
    //Définir mon regex
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const mailUser = input.value;
    if(mailUser.match(emailRegex)){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid"); 
        return true;
    }
    else{
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}

// Fonction de vérification des champs
function validateRequired(input){
    if(input.value != ''){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
        return true;
    }else{
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}

// Fonction de vérification des select
function validateSelect(input) {
    // Vérifie que la valeur sélectionnée n'est pas "default"
    if (input.value !== "Quel type de demande avez-vous ?") {
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
        return true;
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}