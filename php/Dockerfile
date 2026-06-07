FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf
RUN mkdir -p /var/www/html/Public/template/UploadImages \
    && chmod -R 777 /var/www/html/Public/template/UploadImages