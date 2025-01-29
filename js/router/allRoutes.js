import Route from "./Route.js";

// Définir ici vos routes avec la propriété `showSideBar` qui détermine si le rectangle doit s'afficher
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html", "", false),
    new Route("/presentation", "Qui sommes nous ?", "/pages/presentation.html", "", false),
    new Route("/services", "Nos services", "/pages/services.html", "", false),
    new Route("/contact", "Contactez nous", "/pages/contact.html", "", false),
    new Route("/signin", "Connexion", "/pages/auth/connexion.html", "/js/auth/signin.js", false),
    new Route("/signup", "Inscription", "/pages/auth/inscription.html", "/js/auth/signup.js", false),
    new Route("/editPassword", "Modification du mot de passe", "/pages/auth/editPassword.html", "/js/auth/editPassword.js", false),
    new Route("/compte", "Mon Compte", "/pages/auth/compte.html", "", true), // Sidebar visible sur cette page
    new Route("/vehicules", "Véhicules", "/pages/vehicules.html", "", true), // Sidebar visible sur cette page
    new Route("/voyages", "Voyages", "/pages/voyages.html", "", true), // Sidebar visible sur cette page
    new Route("/avis", "Avis", "/pages/avis.html", "", true), // Sidebar visible sur cette page
];

// Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "EcoRide";