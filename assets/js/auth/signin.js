const emailInput = document.getElementById("EmailInput");
const passwordInput = document.getElementById("PasswordInput");
const btnSignin = document.getElementById("btnSignin");



btnSignin.addEventListener("click", function(event) {
    event.preventDefault(); // Empêche le rechargement de la page
    checkCredentials();
});

function checkCredentials(){
    // Ici, il faudrait appeler l'API pour vérifier les credentials en BDD

    if(emailInput.value === "test@mail.com" && passwordInput.value ==="Test1234*"){
        const token = "sfdldsmfdmlkfdmfdmlfkdosffs!qdfp";
        setToken(token);
        setCookie(roleCookieName, "admin", 7);
        window.location.replace("/");
    }else{
        emailInput.classList.add("is-invalid");
        passwordInput.classList.add("is-invalid");
    }
}