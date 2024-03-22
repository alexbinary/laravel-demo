FROM debian:bookworm

# Install php

RUN apt-get update && apt-get install -y \
    php php-xml php-dom php-mbstring php-intl \
    zip unzip php-zip \
    curl php-curl \
    sqlite3 php8.2-sqlite

# Install Composer

COPY --chmod=744 ./composer_install.sh composer_install.sh
RUN ./composer_install.sh ; \
    rm ./composer_install.sh ; \
    mv composer.phar /usr/local/bin/composer

WORKDIR /app