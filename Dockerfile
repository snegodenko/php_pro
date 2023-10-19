FROM php:8.0
COPY . /var/www/html
WORKDIR /var/www/html
CMD ["php", "./index.php"]