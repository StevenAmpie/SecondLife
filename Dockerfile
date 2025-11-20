# ========== Etapa 1: Build de assets (Node + Vite) ==========
FROM node:18 AS build-assets

WORKDIR /app
COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# ========== Etapa 2: PHP + Composer + App Laravel ==========
FROM php:8.2-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
WORKDIR /app
COPY . .

# Copiar los assets compilados
COPY --from=build-assets /app/public/build /app/public/build

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Puerto y ejecución
EXPOSE 8000
CMD php artisan serve --host 0.0.0.0 --port $PORT

