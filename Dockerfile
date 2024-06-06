# Use the official PHP image as the base image
FROM php:8.2-fpm

# Install Node.js and npm
RUN apt-get update && \
    apt-get install -y nodejs npm

RUN npm install -g vite

RUN docker-php-ext-install pdo pdo_mysql

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the Laravel application files to the container
COPY . /var/www/html

# Set proper group ownership for the storage directory
RUN chgrp -R www-data storage bootstrap/cache

# Set proper permissions for the storage directory
RUN chmod -R ug+rwx storage bootstrap/cache

# Expose port 80 if necessary
# EXPOSE 80

# Start PHP-FPM service
# CMD ["php-fpm"]
