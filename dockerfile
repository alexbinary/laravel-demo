FROM debian:bookworm

# Install php

RUN apt-get update && apt-get install php zip unzip php-zip curl php-curl php-xml php-dom -y

# Install Composer

COPY --chmod=744 ./composer_install.sh composer_install.sh
RUN ./composer_install.sh ; \
    rm ./composer_install.sh ; \
    mv composer.phar /usr/local/bin/composer

WORKDIR /app