FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \

RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs npm

# Upgrading Node
RUN npm cache clean -f
RUN npm install -g n

# Adding npm-cache
RUN npm install -g npm-cache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY conf.d/* $PHP_INI_DIR/conf.d/