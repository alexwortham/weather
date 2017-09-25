FROM php:7.0-apache

RUN apt-get update && apt-get install -y cron \
  && rm -r /var/lib/apt/lists/* \
  && pecl install xdebug-2.5.5 \
  && docker-php-ext-enable xdebug

RUN echo "* * * * * root /var/www/html/vendor/bin/crunz schedule:run" >> /etc/crontab

CMD vendor/bin/doctrine orm:schema-tool:drop --force && vendor/bin/doctrine orm:schema-tool:create && cron && apache2-foreground
