FROM php:7.4-apache
ENV DOCUMENT_ROOT /var/www/html/public
ENV APP_ENV development
# Dependencies
RUN apt-get update && apt-get install -y libpng-dev curl libcurl4 libcurl4-openssl-dev
RUN docker-php-ext-install mysqli pdo_mysql pcntl gd
# Debugging
RUN pecl install xdebug-2.9.8 && docker-php-ext-enable xdebug
RUN echo "" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# Apache conf
RUN sed -ri -e 's!/var/www/html!${DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf /etc/apache2/apache2.conf
RUN a2enmod rewrite headers
ADD https://raw.githubusercontent.com/php/php-src/master/php.ini-${APP_ENV} /usr/local/etc/php/conf.d/php.ini