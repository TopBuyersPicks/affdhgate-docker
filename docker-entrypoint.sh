#!/bin/bash

# Start Apache in the background
apache2-foreground &
sleep 5

# Ensure WordPress is installed
if ! wp core is-installed --allow-root; then
  wp core install --url="http://localhost" --title="TopBuyersPicks" --admin_user="admin" --admin_password="NokhodTop2" --admin_email="admin@example.com" --allow-root
fi

# Activate the plugin
wp plugin activate affdhgate --allow-root

# Keep Apache running
wait
