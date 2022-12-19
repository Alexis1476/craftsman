<div>
  <a href="https://github.com/Alexis1476/etml-craftman">
    <h3>Craftsman Challenge</h3>
  </a>
  <p>
    Application pour lancer des activités/défis au sein d'une entreprise.
  </p>
</div>

## A propos du projet

Cette application permet de lancer des défis artisanaux en rélation avec l'informatique.

### Technologies

* [![Tailwind][Tailwind.dev]][Tailwind-url]
* [![Laravel][Laravel.com]][Laravel-url]

### Caractéristiques

- L'utilisateur s'enregistre dans le formulaire de la page d'accueil puis, il reçoit automatiquement 5 activités
  aléatoires.
- Dès que l'utilisateur fini ses 5 activités, 5 autres lui sont attribuées automatiquement.
- Chaque activité vaut des points.
- A chaque activité realisée, l'utilisateur accumule des points.
- L'admin peut modifier et ajouter des activités.
- L'admin peut rechercher un utilisateur par son ID.
- L'admin valide les activités des utilisateurs.

### Systèmes d'authentification

1. User: Fait les activités
2. Admin: Valide les activités faites par les utilisateurs
    - Si right = 1 il peut modofier et ajouter des activités

## Prérequis

PHP 8.0.25 et Composer

## Installation

1. Cloner le dêpot
   ```sh
   git clone https://github.com/agilepartner/craft-challenges.git
   ```
2. Installer composer
   ```sh
   composer install
   ```
3. Créer le fichier des variables d'environnement
   ```sh
   cp .env.example .env
   ```
4. Génerer une clé de projet
    ```sh
   php artisan key:generate
   ```
5. Réferencer les informations de la base de données dans le fichier .env.
    ```text
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=    
    DB_PASSWORD=
    ```
6. Lancer les migrations
    ```sh
   php artisan migrate --seed
   ```
7. Lancer le serveur
    ```sh
   php artisan serve
   ```

# Déploiement (FTP)

Pour deployer le projet dans le serveur FTP :

1. Se connecter au serveur (Nom de domaine / Nom d'utilisateur / Mot de passe).
2. Créer un dossier **src**.
3. Copier tout le code de l'application dans le dossier **src**.
4. Copier tous les fichiers du dossier **public** dans la racine.
5. Dans le fichier **index.php** de la racine, remplacer les "/../"
   par "/scr/" de tous les fichiers inclus.
6. Modifier le fichier **.env** avec les données du serveur:
    - APP_URL
    - DB_HOST
    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD
    - **IMPORTANT:** Mettre le APP_DEBUG = false

## Migrations

1. Pour lancer les migrations il faut enlever les commentaires de la route 'migrate' qui se trouve tout en bas du
   fichier **routes/web.php.**
2. Appeler la route /migrate dans le navigateur pour lancer les migrations. (Ceci est fait comme ça
   étant donnée qu'on n'a pas accès au terminal du serveur pour lancer des commandes).

## Optimisation

1. Enlever les commentaires de la route 'optimization' qui se trouve tout en bas du
   fichier **routes/web.php.**
2. Appeler la route /optimization dans le navigateur (Ceci fait un cache de la config, des views et des routes pour
   optimiser l'application).

<!-- MARKDOWN LINKS & IMAGES -->

[Tailwind.dev]: https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white

[Tailwind-url]: https://tailwindcss.com/

[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white

[Laravel-url]: https://laravel.com
