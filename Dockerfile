FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www
RUN runtimeDeps=" \
       curl \
      git \
      zip \
      libc-client-dev \
      libkrb5-dev \
      libxml2-dev \
      librabbitmq-dev \
      libfreetype6-dev \
      libpng-dev \
      libjpeg-dev \
      libjpeg62-turbo-dev \
    " \
    && apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y $runtimeDeps \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-configure gd --prefix=/usr --with-jpeg --with-freetype \
    && docker-php-ext-install iconv imap \
    && rm -r /var/lib/apt/lists/*

RUN apt-get update -y && apt-get install -y sendmail libpng-dev

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libfreetype6-dev \
    libzip-dev && \
    pecl install amqp && docker-php-ext-enable amqp

RUN apt-get install -y  \
   libfreetype6-dev \
   libmcrypt-dev \
   libjpeg-dev \
   libpng-dev

#RUN apt-get update -y && apt-get install -y pecl install amqp && docker-php-ext-enable amqp

RUN docker-php-ext-install zip
RUN docker-php-ext-install exif
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Change current user to www
USER root

# Expose port 9000 and start php-fpm server
EXPOSE 9001
CMD ["php-fpm"]

ADD . /var/www
RUN chown -R www-data:www-data /var/www
