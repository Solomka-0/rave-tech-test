FROM php:8-fpm-alpine3.13 as base
RUN apk update && apk add g++ make git wget ca-certificates openssl openssh bzip2-dev zlib-dev libpng-dev tzdata fcgi cyrus-sasl-dev mysqli pdo_mysql
# php8-dev
RUN update-ca-certificates
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
