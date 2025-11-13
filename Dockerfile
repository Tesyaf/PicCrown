# -------------------------
# Stage 1: Build Frontend
# -------------------------
FROM node:20 AS build

WORKDIR /app
COPY package.json pnpm-lock.yaml* package-lock.json* yarn.lock* ./

# Install dependencies sesuai package manager
RUN if [ -f pnpm-lock.yaml ]; then \
      npm install -g pnpm && pnpm install; \
    elif [ -f yarn.lock ]; then \
      yarn install; \
    else \
      npm install; \
    fi

COPY . .
RUN if [ -f pnpm-lock.yaml ]; then pnpm run build; \
    elif [ -f yarn.lock ]; then yarn build; \
    else npm run build; fi


# -------------------------
# Stage 2: PHP Runtime
# -------------------------
FROM php:8.3-fpm

# Install sistem essentials
RUN apt-get update && apt-get install -y \
    unzip git libpq-dev libzip-dev libpng-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql zip gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy Laravel
COPY . .

# ENV Laravel
RUN composer install --no-dev --optimize-autoloader

# Copy assets hasil build
COPY --from=build /app/public/build ./public/build

CMD ["php-fpm"]
