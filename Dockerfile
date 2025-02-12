FROM php:8.1-apache

# Install necessary libraries
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install \
    mbstring \
    zip

# Install xdebug
# RUN pecl install xdebug-3.4.0beta1 && docker-php-ext-enable xdebug

# Copy Laravel application
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --ignore-platform-req=ext-mongodb

# Change ownership of our applications
RUN chown -R www-data:www-data /var/www/html

RUN docker-php-ext-install mbstring

COPY .env.example .env
RUN php artisan key:generate

# COPY xdebug.ini "${PHP_INI_DIR}/conf.d"

# Expose port 80 and 9000
EXPOSE 80
# EXPOSE 80 9000

# Adjusting Apache configurations
RUN a2enmod rewrite
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf
