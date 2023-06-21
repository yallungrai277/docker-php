FROM php:8.1-fpm-alpine3.18

RUN docker-php-ext-install pdo pdo_mysql

# allow super user - set this if you use Composer as a 
# super user at all times like in docker containers.
ENV COMPOSER_ALLOW_SUPERUSER=1

# obtain composer using multistage build
# https://docs.docker.com/build/building/multi-stage/
COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

# Here, we are copying only composer.json and composer.lock (instead of copying entire source)
# to make utilize of docker caching.
COPY ./app/composer.* .

# install
RUN composer install  --prefer-dist --no-scripts --no-progress --no-interaction

# Copy application files to working directory
COPY ./app .

# composer dump-autoload
RUN composer dump-autoload --optimize