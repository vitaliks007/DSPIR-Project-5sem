FROM php:8.0-apache
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin/ --filename=composer
RUN alias composer='php /usr/local/bin/composer'

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && apt-get update && pecl install -f redis && docker-php-ext-enable redis

RUN apt-get install -y zip
RUN composer require --prefer-dist nelmio/alice && composer update

RUN apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && docker-php-ext-install gd
RUN composer require szymach/c-pchart

RUN composer update