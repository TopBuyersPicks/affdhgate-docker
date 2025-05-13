FROM wordpress:php8.2-apache

COPY ./plugins/ /var/www/html/wp-content/plugins/
RUN chown -R www-data:www-data /var/www/html/wp-content/plugins

EXPOSE 80
