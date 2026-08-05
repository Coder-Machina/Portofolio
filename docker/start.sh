#!/bin/sh
set -e

# Migrations
php /var/www/html/artisan migrate --force

# Seeder (seulement si la table projects est vide)
php /var/www/html/artisan db:seed --force --class=DatabaseSeeder 2>/dev/null || true

# Storage link
php /var/www/html/artisan storage:link || true

# PHP-FPM en background
php-fpm -D

# Nginx au premier plan
exec nginx -g "daemon off;"
