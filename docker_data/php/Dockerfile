FROM php:8.1-apache

# Install necessary libraries
RUN apt-get update -yqq && \
    apt-get install -y apt-utils zip unzip && \
    apt-get install -y nano && \
    apt-get install -y libzip-dev libpq-dev && \
    a2enmod rewrite && \
    docker-php-ext-install pdo_pgsql && \
    docker-php-ext-install pgsql && \
    docker-php-ext-install zip && \
    docker-php-ext-configure zip && \
    rm -rf /var/lib/apt/lists/*

# Install Composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Use local editable apache config
COPY default.conf /etc/apache2/sites-enabled/000-default.conf

# Set Working Directory to the app folder
WORKDIR /var/www/app

# Load at port 80
EXPOSE 80