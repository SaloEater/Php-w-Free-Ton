FROM php:8.0.11-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends git \
    libffi-dev

RUN docker-php-ext-install ffi

RUN pecl install xdebug

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/
COPY ./dockerfiles/custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Set working directory
WORKDIR /var/www