FROM php:8.2-apache
RUN docker-php-ext-intall mysqli
COPY . /var/www/html/
EXPOSE 80
