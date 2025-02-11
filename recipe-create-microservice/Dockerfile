FROM php:8.1-apache

RUN docker-php-ext-install mysqli

COPY . /var/www/html/
WORKDIR /var/www/html/

EXPOSE 6000
CMD ["php", "-S", "0.0.0.0:6000", "-t", "."]
