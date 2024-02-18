# Guide d'exécution en local

Ce guide vous aidera à configurer et à exécuter le projet Symfony localement sur votre machine. Assurez-vous de suivre attentivement les étapes ci-dessous.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- PHP (version recommandée : >=8.1)
- Composer
- Symfony CLI
- Base de données MySQL version 8.0

## Installation

1. Clonez ce dépôt sur votre machine :
   ```bash
   git clone git@github.com:juanjoc015/Garage-Symfony.git
   ```

2. Accédez au répertoire du projet :
   ```bash
   cd Garage-Symfony
   ```

3. Installez les dépendances PHP à l'aide de Composer :
   ```bash
   composer install
   ```

4. Copiez le fichier `.env` et renommez-le en `.env.local` :
   ```bash
   cp .env .env.local
   ```

5. Configurez les variables d'environnement dans le fichier `.env.local` selon votre environnement de développement (base de données, etc.).

6. Créez la base de données et exécutez les migrations :
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```

## Chargement des Fixtures

Si vous souhaitez charger des données de test dans votre base de données, vous pouvez utiliser les fixtures. Assurez-vous d'avoir installé le bundle DoctrineFixturesBundle.

1. Chargez les fixtures en exécutant la commande suivante :
   ```bash
   php bin/console doctrine:fixtures:load
   ```

## Exécution

Une fois l'installation terminée, vous pouvez démarrer le serveur web local pour exécuter le projet :

```bash
symfony server:start -d
```

Accédez à l'adresse [http://localhost:8000](http://localhost:8000) dans votre navigateur pour voir le projet en action.

## Administration

Pour accéder à l'interface d'administration, rendez-vous sur [http://localhost:8000/admin](http://localhost:8000/admin) et connectez-vous avec les identifiants suivants:

```bash
email: admin1@admin.com, mot de passe: password
```