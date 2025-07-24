# Use the official PHP-Apache image
FROM php:8.1-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy all your project files to Apache's root directory
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
