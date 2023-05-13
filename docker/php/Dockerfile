FROM php:8.2-fpm as base
RUN \
    apt-get update && apt-get install -y git \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install -j$(nproc) intl opcache pdo mysqli pdo_mysql zip

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
