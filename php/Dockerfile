FROM php:8.1-fpm-alpine3.18 as app

COPY --from=mlocati/php-extension-installer:2.1.30 /usr/bin/install-php-extensions /usr/local/bin/

# -e (errexit): Causes the shell to exit immediately if any command within the script exits with a non-zero status, indicating an error.
# -u (nounset): Treats unset variables as an error and causes the shell to exit.
# -x (xtrace): Prints each command before executing it, allowing you to see the commands and their output.
# The semicolon (;) allows multiple commands to be executed on a single line in the shell.
# The backslash (\) is used for line continuation, allowing the command to span multiple lines for readability.
# Install php extensions.
RUN set -eux; \
    install-php-extensions pdo pdo_mysql

# Default command provided by docker to install php-extensions
# RUN docker-php-ext-install pdo pdo_mysql

# allow super user - set this if you use Composer as a 
# super user at all times like in docker containers.
ENV COMPOSER_ALLOW_SUPERUSER=1

# obtain composer using multistage build
# https://docs.docker.com/build/building/multi-stage/
COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

# Here, we are copying only composer.json and composer.lock (instead of copying entire source)
# to make utilize of docker caching.
# https://medium.com/@softius/faster-docker-builds-with-composer-install-b4d2b15d0fff
COPY ./app/composer.* .

# install   
RUN composer install --prefer-dist --no-scripts --no-progress --no-interaction

# Copy application files to working directory
COPY ./app .

# composer dump-autoload
RUN composer dump-autoload --optimize

# Dev image
# This stage is meant to be target-built into a separate image
# https://docs.docker.com/develop/develop-images/multistage-build/#stop-at-a-specific-build-stage
# https://docs.docker.com/compose/compose-file/#target
FROM app as app_dev

# Set to off as it can be process heavy.
ENV XDEBUG_MODE=off

# Copy xdebug config file to container
COPY ./php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Install xdebug
RUN set -eux; \
    install-php-extensions xdebug