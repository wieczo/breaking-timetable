FROM php:8.2-fpm-alpine

# Systempakete & PHP Extensions
RUN apk add --no-cache \
    bash \
    git \
    curl \
    unzip \
    icu-dev \
    libxml2-dev \
    oniguruma-dev \
    zlib-dev \
    mariadb-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    nodejs \
    npm \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        intl \
        zip \
    && rm -rf /var/cache/apk/*

# Composer installieren
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Node global tools (optional z. B. Vite, Laravel Mix)
RUN npm install -g vite

# Arbeitsverzeichnis
WORKDIR /var/www/html

# Entrypoint
CMD ["php-fpm", "-F"]
