# Use official PHP with Apache
FROM php:8.1-apache

# Enable PDO extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy project files into Apache root
COPY PoultryFarm/ /var/www/html/

# Set ownership to Apache user
RUN chown -R www-data:www-data /var/www/html
