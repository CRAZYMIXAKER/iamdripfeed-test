FROM php:8.2-fpm

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY conf.d/* $PHP_INI_DIR/conf.d/