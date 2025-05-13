FROM wordpress:latest

# Set working directory
WORKDIR /var/www/html

# Copy plugin to WordPress plugins directory
COPY plugins/affdhgate /var/www/html/wp-content/plugins/affdhgate

# Copy entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Set custom entrypoint
ENTRYPOINT ["docker-entrypoint.sh"]

# Expose port
EXPOSE 80
