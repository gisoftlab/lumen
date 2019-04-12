# Lumen PHP Framework

## Install vendoes
composer install

## Permissions 
sudo chmod -R a+rwX storage/logs

## setup configuration files
cp .env.example .env
APP_KEY= yourOwnApiLey
JWT_SECRET = yourOwnJwtSecret

DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

## create database
php artisan migrate

## add seeds
php artisan db:seed

## generate optimization
composer dump-autoload

## generate documentation
php artisan apidoc:generate

## view documentation
http://domain.local/docs/index.html

##  PHP Unit
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/ExampleTest.php
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/functional/AuthActionsTest.php
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/functional/TeamActionsTest.php
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/functional/UserActionsTest.php