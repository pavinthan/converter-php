FROM php:8.0-cli-alpine3.13
LABEL mantainer="Pavinthan Sivakumar <pavinthan@outlook.com>"

WORKDIR /tmp

RUN apk --no-cache add \
    bash \
    && php -r "copy('https://pear.php.net/go-pear.phar', 'go-pear.phar');" \
    && php go-pear.phar \
    && php -r "unlink('go-pear.phar');" \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/bin --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && composer require "phpunit/phpunit" --prefer-source --no-interaction \
    && composer require "phpunit/php-invoker" --prefer-source --no-interaction \
    && ln -s /tmp/vendor/bin/phpunit /usr/local/bin/phpunit \
    && sed -i 's/nn and/nn, Pavinthan Sivakumar <pavinthan@outlook.com> (Docker) and/g' /tmp/vendor/phpunit/phpunit/src/Runner/Version.php

WORKDIR /app
COPY . /app

RUN composer install && \ 
    chmod +x ./cli.php && \ 
    chmod +x ./entrypoint.sh && \
    phpunit .

EXPOSE 8080

ENTRYPOINT [ "./entrypoint.sh" ]
