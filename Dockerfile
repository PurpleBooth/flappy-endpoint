FROM php:5-apache

COPY . /var/www/html/
COPY .htaccess /var/www/html/

RUN apt-get update && \
    apt-get install -y git zlib1g-dev apache2 && \
    rm -r /var/lib/apt/lists/* && \
    a2enmod rewrite && \
    docker-php-ext-configure zip && \
    docker-php-ext-install zip && \
    curl -sS https://getcomposer.org/installer | php && \
    php composer.phar install
