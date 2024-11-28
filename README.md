<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Instructions pour exécuter le projet Laravel

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants :

-   [PHP](https://www.php.net/downloads) (version 8.0 ou supérieure)
-   [Composer](https://getcomposer.org/download/)
-   [Laravel](https://laravel.com/docs/8.x/installation) (version 8.x ou supérieure)
-   [MySQL](https://www.mysql.com/downloads/) ou un autre système de gestion de base de données

## Cloner le projet

Clonez le dépôt GitHub sur votre machine locale :

```bash
git clone https://github.com/votre-utilisateur/votre-projet.git
cd votre-projet
```

## Installation des dépendances

Installez les dépendances du projet avec Composer :

```bash
composer install
```

OU

```bash
composer update
```

si votre version de PHP diffère de celle utilisée pour l'appli

## Configuration de l'environnement

Copiez le fichier `.env.example` en `.env` :

```bash
cp .env.example .env
```

Modifiez le fichier `.env` pour configurer votre base de données et d'autres paramètres selon vos besoins.

## Générer la clé d'application

Générez la clé d'application Laravel :

```bash
php artisan key:generate
```

## Migration de la base de données

Exécutez les migrations pour créer les tables nécessaires dans la base de données :

```bash
php artisan migrate
```

## Peupler la base de données

Si vous souhaitez peupler la base de données avec des données de test, exécutez le seeder :

```bash
php artisan db:seed
```

## Lancer les serveurs

Démarrez le serveur de développement intégré de Node pour l'utilisation de Vite :

```bash
yarn
yarn dev
```

OU

```bash
npm install
npm run dev
```

Dans un autre terminal, démarrez le serveur de développement intégré de Laravel :

```bash
php artisan serve
```

Vous pouvez maintenant accéder à votre application à l'adresse [http://localhost:8000](http://localhost:8000).

## Aide supplémentaire

Pour plus d'informations, consultez la [documentation officielle de Laravel](https://laravel.com/docs).

## Création de l'utilisateur administrateur

Pour créer un utilisateur administrateur dans la base de données, exécutez le seeder :

```bash
php artisan db:seed UserSeeder
```

## Connexion en tant qu'administrateur

Pour vous connecter en tant qu'administrateur pour la première fois, utilisez les informations suivantes :

-   **Email** : `fake@admin.com`
-   **Mot de passe** : `admin`

Après avoir démarré le serveur, accédez à la page de connexion à l'adresse [http://localhost:8000/login](http://localhost:8000/login) et entrez les informations ci-dessus.

### Remarque

Il est recommandé de changer le mot de passe après votre première connexion pour des raisons de sécurité.
