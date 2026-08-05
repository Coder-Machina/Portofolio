FROM php:8.4-fpm-alpine
WORKDIR /var/www/html

RUN apk add --no-cache \
    nginx \
    nodejs \
    npm \
    git \
    zip \
    unzip \
    curl \
    oniguruma-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    icu-dev \
    libpq-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo pdo_pgsql zip intl bcmath opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Dépendances PHP
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist --no-scripts

# Dépendances JS + build
COPY package.json package-lock.json ./
RUN npm ci

# Code source
COPY . .
ARG APP_URL=https://portofolio-fuzl.onrender.com
ENV APP_URL=${APP_URL}
RUN npm run build

# Finaliser composer (scripts post-install)
RUN composer run-script post-autoload-dump

RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN if [ ! -f database/database.sqlite ]; then mkdir -p database && touch database/database.sqlite; fi
RUN php artisan key:generate --force
RUN php artisan migrate --force
RUN php artisan db:seed --force

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 10000
CMD ["/start.sh"]
