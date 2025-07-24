# Use the official PHP-Apache image
FROM php:8.1-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy all PHP project files from PoultryFarm folder to Apache root
COPY PoultryFarm/ /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
