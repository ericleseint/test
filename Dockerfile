FROM php:5.6.28-apache

RUN docker-php-ext-install pdo pdo_mysql
COPY source/ /var/www/html/