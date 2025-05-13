#!/bin/bash
set -e

# Install WordPress if not installed
if [ ! -f /var/www/html/wp-config.php ]; then
  wp core download --allow-root
  wp config create --dbname=wordpress --dbuser=root --dbpass= --dbhost=localhost --allow-root
  wp core install --url="http://localhost" --title="affDhgate" --admin_user=admin --admin_password=NokhodTop2 --admin_email=admin@example.com --skip-email --allow-root
  wp plugin activate affdhgate --allow-root
fi

exec "$@"
