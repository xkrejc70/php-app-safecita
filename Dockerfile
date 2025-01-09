FROM dunglas/frankenphp

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql

COPY ./app /app
    
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

WORKDIR /app
RUN composer install