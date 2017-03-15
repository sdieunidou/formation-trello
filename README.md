Symfony 3: TD Suivi d'activité
======

```
* listing des tâches par catégorie
* Ajout/Edition catégorie
* API categories / taches
* Administration (sonata admin)
* Tests unitaires / fonctionnels
```

# Installation

```
composer install
bin/console doctrine:migrations:migrate
bin/console doctrine:fixtures:load
```

# Tests

```
php vendor/bin/phpunit
```
