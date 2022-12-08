<div align="center">
  <a href="https://github.com/Alexis1476/etml-craftman">
    <h3 align="center">Craftsman Challenge</h3>
  </a>
  <p align="center">
    Application pour lancer des activités/défis au sein d'une entreprise.
  </p>
</div>

<!-- ABOUT THE PROJECT -->
## A propos du projet

Cette application permet de lancer des défis artisanaux en rélation avec l'informatique.

### Technologies

* [![Tailwind][Tailwind.dev]][Tailwind-url]
* [![Laravel][Laravel.com]][Laravel-url]

### Caractéristiques
- L'utilisateur s'enregistre dans le formulaire de la page d'accueil puis, il reçoit automatiquement 5 activités aléatoires.
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
3. Installer composer
   ```sh
   composer install
   ```
4. Créer le fichier des variables d'environnement
   ```sh
   cp .env.example .env
   ```
5. Génerer une clé de projet
    ```sh
   php artisan key:generate
   ```
6. Réferencer les informations de la base de données dans le fichier .env.
    ```sh
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=    
    DB_PASSWORD=
    ```
7. Lancer les migrations
    ```sh
   php artisan migrate --seed
   ```
8. Lancer le serveur
    ```sh
   php artisan serve
   ```

<!-- MARKDOWN LINKS & IMAGES -->
[Tailwind.dev]: https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white
[Tailwind-url]: https://tailwindcss.com/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
