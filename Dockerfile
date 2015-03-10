# Playground Application CLI
# ==========================

FROM phundament/app:cli

# Update and install system base packages
ENV IMAGE_PRODUCTION_APT_GET_DATE 2015-02-23-00-34
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y \
        mysql-client && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /app

# Prepare composer
# /!\ Note: Please add your own API token to config.json; Phundament comes with a public token for your convenince, which may hit a rate limit
ADD ./build/stack/php-cli/config.json /root/.composer/config.json

# Install packages first
ADD ./composer.lock /app/composer.lock
ADD ./composer.json /app/composer.json
RUN /usr/local/bin/composer install --prefer-dist --optimize-autoloader

# Add application code
ADD . /app

CMD ["echo", "This is the application CLI and data container, run\n\n  docker-compose run cli /bin/bash\n\nfor executing multiple one-off commands.\n\nThis container will exit now - its data volumes will stay available to other containers."]