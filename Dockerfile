FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

COPY PoultryFarm/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html
