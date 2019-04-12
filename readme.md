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
