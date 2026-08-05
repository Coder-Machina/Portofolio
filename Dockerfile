FROM php:8.4-cli

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    curl \
    ca-certificates \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libicu-dev \
    nodejs \
    npm \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo pdo_mysql zip intl bcmath pcntl \
 && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
RUN npm install
RUN npm run build
RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN if [ ! -f database/database.sqlite ]; then mkdir -p database && touch database/database.sqlite; fi
RUN php artisan key:generate --force
RUN php artisan migrate --force
RUN php artisan db:seed --force

EXPOSE 10000
CMD ["sh", "-lc", "php artisan serve --host 0.0.0.0 --port ${PORT:-10000} --no-reload"]
