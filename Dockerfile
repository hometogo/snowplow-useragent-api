FROM php:7.2-apache

ENV APACHE_DOCUMENT_ROOT /var/www/html/web

RUN apt-get update && apt-get install -y git zlib1g-dev unzip\
    --no-install-recommends && rm -rf /var/lib/apt/lists/* &&\
    docker-php-ext-install zip &&\
    sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g'\
        /etc/apache2/sites-available/*.conf &&\
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g'\
        /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf &&\
    sed -ri -e '/DocumentRoot/a\\tRewriteEngine on\n\tRewriteCond %{REQUEST_FILENAME} !-f\n\tRewriteCond %{REQUEST_FILENAME} !-d\n\tRewriteRule ^(.*)$ /index.php?q=$1 [L,QSA]'\
        /etc/apache2/sites-available/*.conf &&\
    a2enmod rewrite

RUN useradd -m -G www-data -s /bin/bash web &&\
    chown -R web:www-data /var/www/html/ &&\
    chmod -R 0775 /var/www/html/

USER web 
WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . /var/www/html/

RUN /usr/bin/composer install --no-plugins --no-scripts --no-interaction &&\
    bin/console cache:warmup

USER root