FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev \
    && docker-php-ext-install mysqli pdo_pgsql pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html/
WORKDIR /var/www/html/

RUN composer install --no-dev --optimize-autoloader --no-interaction

EXPOSE 6003

CMD ["php", "-S", "0.0.0.0:6003", "-t", ".", "index.php"]
