# Use the official PHP image as the base image
FROM php:8.2-fpm


# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN apt update

RUN apt install sudo -y

RUN curl -fsSL https://deb.nodesource.com/setup_current.x | sudo -E bash -

RUN sudo apt install nodejs -y



# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .

# Copy existing application directory permissions
COPY --chown=www-data:www-data . .

RUN npm install

RUN npm run build

RUN composer install --no-interaction --optimize-autoloader --no-dev

# Expose port 9000 and start php-fpm server
EXPOSE 8000
#CMD ["php-fpm"]



CMD ["php", "artisan", "serve", "--host=0.0.0.0"]


