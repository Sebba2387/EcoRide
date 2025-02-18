# Manuel de ploiement de l'application de covoiturage EcoRide en local

## Prérequis
Avant de commencer, il est impératif d'installer les éléments suivants :
- **PHP** (>=7.x)
- **MySQL** (ou MariaDB)
- **Apache** (ou tout autre serveur compatible avec PHP)
- **Git** (optionnel, pour cloner le projet)

## Étapes d'installation
### 1. Cloner le projet
Si vous utilisez Git, clonez le commit
```sh
git clone https://github.com/Sebba2387/EcoRide.git
cd EcoRide
```
Sinon, il faut télécharger le projet et l'extraire dans un répertoire accessible par le serveur web.

### 2. Configurer la base de données
- Il est nécessaire de créer une base de données MySQL :
```sql
CREATE DATABASE ecoriders;
```
- Importez le fichier SQL fourni (situé dans `/backend/database/database.sql`) : 
```sh
mysql -u root -p ecoriders < backend/database/database.sql
```
### 4. Configurer un serveur local
- Si vous utilisez **Apache** :
  - Il faut placer le dossier du projet dans le répertoire `htdocs`
  - Configurez un hôte virtuel si nécessaire
- Si vous utilisez **PHP intégré**, lancez simplement :
```sh
php -S localhost:8000 -t www
```

### 5. Accéder à l'application
Il faut ouvrir le navigateur et se rendre sur :
```
http://localhost/EcoRide
```
Dans le cas d'un serveur PHP intégré

```
http://localhost:8000/
```

### 5. Structure du projet

```
/EcoRide
│── /backend       # Contient la logique métier et l'accès aux données
│── /www           # Dossier public (accessible via le navigateur)
│── /www/auth      # Pages de connexion et d'inscription
│── /www/assets    # Fichiers CSS, JS et images
│── /www/views     # Vues HTML/PHP
│── README.md      # Documentation du projet
```


### 6. Dépannage
- Il faut vérifier que le serveur MySQL est bien démarré.
- Il faut vérifier que les droits d'accès aux fichiers sont corrects.
- Il faut consulter les logs d'Apache/PHP en cas d'erreur.

---
**Besoin d'aide ? ** Vous pouvez nous contacter via le dépôt GitHub !





