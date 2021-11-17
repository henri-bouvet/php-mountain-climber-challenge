FROM php:8.0.12-fpm

# Install dev dependencies
WORKDIR /tmp

RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install -y \
    vim \
    wget \
    git \
    software-properties-common 

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

RUN apt-get install -y \
    libzip-dev \
    libicu-dev

ENV PHP_MEMORY_LIMIT=4G

# Switch to app directory
WORKDIR /datatp


