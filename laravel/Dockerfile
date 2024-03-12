FROM tangramor/nginx-php8-fpm:latest
COPY . /var/www/html
ENV TZ Etc/UTC
ENV WEBROOT /var/www/html/public
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN  cd /var/www/html \
    && composer update \
    && chown -Rf nginx.nginx /var/www/html

EXPOSE 80
