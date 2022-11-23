FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && apt-get update && pecl install -f redis && docker-php-ext-enable redis