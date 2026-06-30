FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

EXPOSE 80
