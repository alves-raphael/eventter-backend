FROM php:7.4-cli

COPY . /usr/src/myapp

WORKDIR /usr/src/myapp

RUN apt-get update && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install mysqli pdo pdo_mysql gd && docker-php-ext-enable pdo_mysql


CMD [ "php", "-S", "0.0.0.0:8080" ]