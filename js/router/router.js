import Route from "./Route.js";
import { allRoutes, websiteName } from "./allRoutes.js";

// Création d'une route pour la page 404 (page introuvable)
const route404 = new Route("404", "Page introuvable", "/pages/404.html");

// Fonction pour récupérer la route correspondant à une URL donnée
const getRouteByUrl = (url) => {
  let currentRoute = allRoutes.find(route => route.url === url);
  // Si aucune correspondance n'est trouvée, on retourne la route 404
  return currentRoute || route404;
};

// Fonction pour charger le contenu de la page
const LoadContentPage = async () => {
  const path = window.location.pathname;
  const actualRoute = getRouteByUrl(path); // Récupération de la route actuelle

  // //Vérifier les droits d'accès à la page
  // const allRolesArray = actualRoute.authorize;
  // if(allRolesArray.length > 0){
  //   if(allRolesArray.includes("disconnected")){
  //     if(isConnected()){
  //       window.location.replace("/");
  //     }
  //   }
  //   else{
  //     const roleUser = getRole();
  //     if(!allRolesArray.includes(roleUser)){
  //       window.location.replace("/");
  //     }
  //   }
  // }

  console.log('Route actuelle :', actualRoute); // Log de la route actuelle

  // Récupération du contenu HTML de la route
  const html = await fetch(actualRoute.pathHtml).then((data) => data.text());

  // Ajout du contenu HTML à l'élément avec l'ID "main-page"
  document.getElementById("main-page").innerHTML = html;

  // Vérification de l'élément #sidebar et affichage s'il y a lieu
  toggleSideBar(actualRoute.showSideBar);

  // Ajout du contenu JavaScript
  if (actualRoute.pathJS) {
    let scriptTag = document.createElement("script");
    scriptTag.setAttribute("type", "text/javascript");
    scriptTag.setAttribute("src", actualRoute.pathJS);
    document.querySelector("body").appendChild(scriptTag);
  }

  // Changement du titre de la page
  document.title = `${actualRoute.title} - ${websiteName}`;

  //Afficher et masquer les éléments en fonction des rôles
  showAndHideElementsForRoles();
};

// Fonction pour gérer la visibilité de la barre latérale (sidebar)
const toggleSideBar = (show) => {
  const leftSideBar = document.getElementById("sidebar");

  console.log('Sidebar existante :', leftSideBar); // Log de l'élément sidebar

  if (leftSideBar) {
    if (show) {
      console.log('Affichage de la sidebar');
      leftSideBar.classList.add("show"); // Ajout de la classe "show" pour afficher
    } else {
      console.log('Masquage de la sidebar');
      leftSideBar.classList.remove("show"); // Retrait de la classe "show" pour cacher
    }
  } else {
    console.log('Element #sidebar introuvable');
  }
};

// Fonction pour gérer les événements de routage (clic sur les liens)
const routeEvent = (event) => {
  event.preventDefault(); // Empêche l'action par défaut du lien
  const url = event.target.href;

  // Mise à jour de l'URL dans l'historique du navigateur
  window.history.pushState({}, "", url);

  // Chargement du contenu de la nouvelle page
  LoadContentPage();
};

// Gestion de l'événement de retour en arrière dans l'historique du navigateur
window.onpopstate = LoadContentPage;

// Assignation de la fonction routeEvent à la propriété route de la fenêtre
window.route = routeEvent;

// Chargement du contenu de la page au chargement initial
LoadContentPage();






