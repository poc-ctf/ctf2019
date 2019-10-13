FROM composer:1.8.6 AS composer
WORKDIR /app
RUN composer require michelf/php-markdown

FROM php:7.2-apache
COPY --from=composer /app/vendor /var/www/vendor
