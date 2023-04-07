FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install dependencies with Composerdocker build -t my-laravel-app .
RUN composer install

# Expose port 8000 and start PHP-FPM server
EXPOSE 8888
CMD ["php", "artisan", "key:generate"]

CMD ["nohup", "php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8888", "&"]
