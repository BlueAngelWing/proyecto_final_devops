FROM php:8.1

# Install required extensions for Laravel
RUN apt-get update \
    && apt-get install -y libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /var/www
WORKDIR /var/www

# Copy the project into the container
COPY . /var/www

# Install project dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Generate application key
RUN php artisan key:generate

# Run database migrations
RUN php artisan migrate --force

# Serve the project with nohup
CMD nohup php artisan serve --host=0.0.0.0 --port=8888 &