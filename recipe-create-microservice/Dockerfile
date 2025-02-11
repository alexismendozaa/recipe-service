FROM php:8.1-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install mysqli

# Instalar Composer para manejar dependencias de PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar archivos al contenedor
COPY . /var/www/html/
WORKDIR /var/www/html/

# Instalar dotenv para cargar variables de entorno en PHP
RUN composer require vlucas/phpdotenv

# Exponer el puerto 6000
EXPOSE 6000

# Comando de ejecución
CMD ["php", "-S", "0.0.0.0:6000", "-t", "."]
