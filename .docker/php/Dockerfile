FROM php:8.1.11-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    build-essential \
    libfreetype6-dev \
    libjpeg-dev \
    libpng-dev \
    libwebp-dev \
    locales \
    zip \
    jpegoptim \
    optipng \
    pngquant  \
    gifsicle \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql -j$(nproc) gd

RUN curl -sL https://deb.nodesource.com/setup_16.x  | bash - && apt-get install -y nodejs
RUN npm install -g npm@latest

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www/html

COPY --chown=www:www . /var/www/html

USER www

EXPOSE 9000
CMD ["php-fpm"]
