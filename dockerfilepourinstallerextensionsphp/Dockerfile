FROM php:5.6.28-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli gd
#RUN apt-get update && \
#           apt-get install -y libfreetype6-dev libjpeg62-turbo-dev && \
#            docker-php-ext-install mysqli && \
#            docker-php-ext-install mbstring && \
#            docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/  &&  \
#            docker-php-ext-install gd