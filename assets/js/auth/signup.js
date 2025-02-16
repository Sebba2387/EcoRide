// Récupération des éléments concernés
const inputNom = document.getElementById("NomInput");
const inputPrenom = document.getElementById("PrenomInput");
const inputAge = document.getElementById("AgeInput");
const inputTelephone = document.getElementById("TelephoneInput");
const inputEmail = document.getElementById("EmailInput");
const inputEmailConfirm = document.getElementById("EmailInputConfirm");
const inputPassword = document.getElementById("PasswordInput");
const inputPasswordConfirm = document.getElementById("PasswordInputConfirm");
const inputPresentation = document.getElementById("PresentationInput");
const inputGenre = document.getElementById("GenreInput");
const inputCigarette = document.getElementById("CigaretteInput");
const inputMusique = document.getElementById("MusiqueInput");
const inputSilence = document.getElementById("SilenceInput");
const inputAnimaux = document.getElementById("AnimauxInput");
const btnSignup = document.getElementById("SignupBtn");

// Suivi des émléments concernés
inputNom.addEventListener("keyup", validateForm);
inputPrenom.addEventListener("keyup", validateForm);
inputAge.addEventListener("keyup", validateForm);
inputTelephone.addEventListener("keyup", validateForm);
inputEmail.addEventListener("keyup", validateForm);
inputEmailConfirm.addEventListener("keyup", validateForm);
inputPassword.addEventListener("keyup", validateForm);
inputPasswordConfirm.addEventListener("keyup", validateForm);
inputPresentation.addEventListener("keyup", validateForm);
inputGenre.addEventListener("click", validateForm);
inputCigarette.addEventListener("click", validateForm);
inputMusique.addEventListener("click", validateForm);
inputSilence.addEventListener("click", validateForm);
inputAnimaux.addEventListener("click", validateForm);

// Désactiver le bouton d'inscription au chargement
btnSignup.disabled = true;

// Fonction de validation du formulaire
function validateForm() {
    const nomOk = validateRequired(inputNom);
    const prenomOk = validateRequired(inputPrenom);
    const emailOK = validateMail(inputEmail);
    const emailConfOk = validateMailConfirm(inputEmail, inputEmailConfirm)
    const passwordOk = validatePassword(inputPassword);
    const passwordConfOk = validatePasswordConfirm(inputPassword, inputPasswordConfirm);

    // Fonction d'activation du bouton d'inscriptions
    if(nomOk && prenomOk && emailOK && emailConfOk && passwordOk && passwordConfOk){
        btnSignup.disabled = false;
    }else{
        btnSignup.disabled = true;
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
// Fonction de confirmation de mail
function validateMailConfirm(inputM, inputConfirmM){
    if(inputConfirmM.value === ""){
        inputConfirmM.classList.add("is-invalid");
        inputConfirmM.classList.remove("is-valid");
        return false;
    }
    if(inputM.value == inputConfirmM.value){
        inputConfirmM.classList.add("is-valid");
        inputConfirmM.classList.remove("is-invalid"); 
        return true;
    }
    else{
        inputConfirmM.classList.add("is-invalid");
        inputConfirmM.classList.remove("is-valid");
        return false;
    }
    
}
// Fonction de confirmation de mot de passe
function validatePasswordConfirm(inputPwd, inputConfirmPwd){
    if(inputConfirmPwd.value === "") {
        inputConfirmPwd.classList.add("is-invalid");
        inputConfirmPwd.classList.remove("is-valid");
        return false;
    }
    if(inputPwd.value === inputConfirmPwd.value){
        inputConfirmPwd.classList.add("is-valid");
        inputConfirmPwd.classList.remove("is-invalid"); 
        return true;
    } else {
        inputConfirmPwd.classList.add("is-invalid");
        inputConfirmPwd.classList.remove("is-valid");
        return false;
    }
}
// Fonction de vérification du Password
function validatePassword(input){
    //Définir mon regex
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
    const passwordUser = input.value;
    if(passwordUser.match(passwordRegex)){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid"); 
        return true;
    }
    else{
        input.classList.add("is-invalid");
        input.classList.remove("is-valid");
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