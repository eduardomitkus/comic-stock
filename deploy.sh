#!/usr/bin/env bash
composer install
cp .env.example  .env
php artisan key:generate
php artisan migrate
php artisan db:seed
chmod 777 .env
chmod -R 777 storage
chmod -R 777 bootstrap/cache/