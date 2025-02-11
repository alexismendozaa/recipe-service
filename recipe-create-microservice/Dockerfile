FROM php:8.1-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev \
    && docker-php-ext-install mysqli pdo_pgsql pgsql

# Instalar Composer para manejar dependencias de PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar archivos al contenedor
COPY . /var/www/html/
WORKDIR /var/www/html/

# Instalar dependencias con Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Exponer el puerto 6000
EXPOSE 6000

# Comando de ejecución
CMD ["php", "-S", "0.0.0.0:6000", "-t", "."]
