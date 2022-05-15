# PHP
FROM php:8.0-apache

# Modules apache
RUN a2enmod headers deflate expires rewrite
EXPOSE 80

# Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN composer --version

# Permet les commandes apt-get install suivantes
RUN apt-get update

# Paquets nécessaires à l'installation de WordPlate + utiles
RUN apt-get install -y zip unzip vim

# Extensions MySQL pour PHP/WordPress
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Imagick pour WordPress (https://webapplicationconsultant.com/docker/how-to-install-imagick-in-php-docker/)
RUN apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick

# Virtualhost
COPY Docker-vhost.conf /etc/apache2/sites-enabled/docker-vhost-wp.conf

# Redémarrage de Apache pour tenir compte des modifications + modules installés
RUN service apache2 restart

# Alias bien pratique
# RUN alias ll='ls -al'

WORKDIR /var/www/html/app
