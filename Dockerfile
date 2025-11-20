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

WORKDIR /app

# SOLO copiamos el código DESPUÉS del build de vite
COPY . .

# Copiar los assets compilados SIN sobrescribir luego
COPY --from=build-assets /app/public/build /app/public/build

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Permisos
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# No corremos migrate automáticamente
# RUN php artisan migrate --force

EXPOSE 8000

# Comando de ejecución (php-fpm)
CMD ["php-fpm"]

