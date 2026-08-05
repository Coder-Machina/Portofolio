#!/bin/sh
set -e

# Migrations
php /var/www/html/artisan migrate --force

# Storage link
php /var/www/html/artisan storage:link || true

# PHP-FPM en background
php-fpm -D

# Nginx au premier plan
exec nginx -g "daemon off;"
