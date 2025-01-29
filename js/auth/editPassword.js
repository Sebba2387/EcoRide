// Récupération des éléments concernés
const inputEmail = document.getElementById("EmailInput");
const inputPassword = document.getElementById("PasswordInput");
const inputPasswordConfirm = document.getElementById("PasswordInputConf");
const btnEditPassword = document.getElementById("editPasswordBtn");

// Suivi des émléments concernés
inputEmail.addEventListener("keyup", validateForm);
inputPassword.addEventListener("keyup", validateForm);
inputPasswordConfirm.addEventListener("keyup", validateForm);


// Désactiver le bouton d'inscription au chargement
btnEditPassword.disabled = true;

// Fonction de validation du formulaire
function validateForm() {
    const emailOK = validateMail(inputEmail);
    const passwordOk = validatePassword(inputPassword);
    const passwordConfOk = validatePasswordConfirm(inputPassword, inputPasswordConfirm);

    // Fonction d'activation du bouton d'inscriptions
    if(emailOK && passwordOk && passwordConfOk){
        btnEditPassword.disabled = false;
    }else{
        btnEditPassword.disabled = true;
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