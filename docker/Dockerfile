FROM php:8-fpm

# Аргументы принимающие из docker-compose.yml
ARG user
ARG uid

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    mc \
    nano \
    vim \
    libmagickwand-dev \
    imagemagick \
    zlib1g-dev \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    unzip \
    zsh \
    libpq-dev \
    git

# Очистка кэша apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Последний композер
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Создание системного пользователя
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Установка рабочей директории
WORKDIR /var/www

USER $user
