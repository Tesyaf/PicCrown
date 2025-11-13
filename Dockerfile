# ---------- Stage 1: Build assets ----------
FROM node:20 AS assets
WORKDIR /app

COPY package.json package-lock.json* ./
RUN npm install

COPY resources ./resources
COPY vite.config.js .
COPY postcss.config.js .
COPY tailwind.config.js .

RUN npm run build


# ---------- Stage 2: PHP ----------
FROM php:8.3-fpm

# Install deps
RUN apt-get update && apt-get install -y \
    libpq-dev unzip git curl \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Copy built assets
COPY --from=assets /app/public/build ./public/build

# Install backend deps
RUN composer install --no-dev --optimize-autoloader

# Laravel optimize
RUN php artisan key:generate --force
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]