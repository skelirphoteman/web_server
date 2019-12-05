FROM php:fpm
RUN apt-get update 
RUN apt-get install -y libicu-dev
RUN docker-php-ext-install intl
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-configure pdo_mysql
RUN docker-php-ext-enable pdo_mysql