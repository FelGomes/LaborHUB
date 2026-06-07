FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
RUN mkdir -p /var/www/html/Public/template/UploadImages \
    && chmod -R 777 /var/www/html/Public/template/UploadImages