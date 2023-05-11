FROM php:8.2-fpm AS php-base
ARG WWW_USER
ARG WWW_GROUP

RUN \
    apt-get update && apt-get install -y git \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install -j$(nproc) intl opcache pgsql pdo pdo_pgsql zip

# && mkdir /.composer && chown ${WWW_GROUP}:${WWW_USER} /.composer \
# && ln -s /usr/bin/git /usr/local/bin/git

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html

FROM php-base as php-dev
RUN pecl install xdebug-3.2.0 && rm -rf /tmp/pear && docker-php-ext-enable xdebug;

