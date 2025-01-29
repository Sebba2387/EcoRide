# EcoRide
Cette application de covoiturage met l'accent sur le respect de l'environnement en favorisant des solutions de mobilité durable. Elle encourage l'utilisation de véhicules à faibles émissions de carbone, tels que les voitures électriques, hybrides ou fonctionnant avec des biocarburants. En intégrant des critères écologiques dans son fonctionnement, l'application propose des options de covoiturage optimisées pour réduire l'empreinte carbone des trajets.

De plus, des fonctionnalités telles que la mise en avant des conducteurs utilisant des véhicules écologiques, le calcul d'économies en émissions de CO₂ et des conseils pour une conduite écoresponsable viennent renforcer son engagement envers une mobilité respectueuse de l'environnement.

Cette initiative s'inscrit dans une démarche globale visant à promouvoir une transition écologique tout en offrant une solution pratique, économique et conviviale pour les utilisateurs.

# Etapes
FrontEnd
1. Mise en place du système de routage ✅
2. Instalaltion de la bibliothèque de Boostrap ✅
3. Configuration de l'environnement de travail ✅
4. Mise en places des routes ✅
5. construction des pages HTML/CSS ✅
6. Ajouter des effets dynamiques : ❓
    Ajouter des animations (boutons) ❌
    Ajouter des transitions❌
    Ajouter chronomètre ❌
    Améliorer les pages (voyages, avis) ❌
Backend
1. Préparer l'environnement & vérification ✅
2. Structurer le projet sans casser l'existant ✅
    Construire un dossier "backend" 
    Construire la structure demandée dans le dossier "backend" 
3. Configurer la base de donnée ✅
    Construire une base de donnée "ecoride_db"
    Construire les tables 
4. Connecter PHP à MySQL ✅
    Dans "backend/includes/config.php", ajouter la connexion à MySQL 
    tester la connexion 
5. Transformer les pages HTML en PHP 🚨
    Commencer par "index.html / index.php"
    Construire le : "header.php" et le "footer.php"
    Convertir les pages HTML en PHP dans : "backend/views/"
6. Ajouter l'inscription et la connexion
    Créer un formulaire d’inscription dans "views/signup.php"
    Créer un fichier "controllers/auth.php" qui gère l'inscription et la connexion
    Utiliser les sessions PHP pour gérer les utilisateurs connectés
7. Gérer le profil utilisateur
    Afficher et modifier les infos de l'utilisateur connecté "views/compte.php"
    Faire le lien avec la base de données "controllers/profile.php"
8. Ajouter les véhicules et voyages
    Créer des formulaires pour ajouter/modifier un véhicule "views/vehicules.php"
    Créer un système d’affichage des voyages sous forme de tableau "views/voyages.php"
    Gérer les réservations et avis "controllers/voyages.php"
9. Supprimer le dossier "backend" et fusionner avec le projet
    Remplacer "pages" par "views"
    Déplacer les fichiers PHP au bon endroit
    Rediriger "index.html" vers "index.php"


# Installation

