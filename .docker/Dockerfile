FROM php:8.0.16-apache-buster
LABEL author="Elayne Lemos <elayne.l.lemos@gmail.com>"

ADD conf/ /tmp/conf/

SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN a2enmod rewrite \
    && mv /tmp/conf/php.ini /usr/local/etc/php/php.ini \
    && mv /tmp/conf/000-default.conf /etc/apache2/sites-available/000-default.conf \
    && curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get update \
    && apt-get install -y --no-install-recommends \
      nodejs \
      nano \
      vim \
      apt-transport-https \
      gnupg2 \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libmcrypt-dev \
      libpng-dev \
      libzip-dev \
      libonig-dev \
      libxml2-dev \
      libgmp-dev \
      libssl-dev \
      zip \
      unzip \
      nodejs \
      gnupg2 \
    && docker-php-ext-install \
      mbstring \
      gmp \
      zip \
    && npm install -g cross-env \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && docker-php-ext-configure gd \
      --with-freetype=/usr/include/ \
      --with-jpeg=/usr/include/ \
    && docker-php-ext-install gd \
    && curl -sS https://getcomposer.org/installer | php -- \
      --install-dir=/usr/local/bin \
      --filename=composer \
      --version=2.2.7 \
    && apt-get clean \
 	&& rm -rf /var/lib/apt/lists/*
