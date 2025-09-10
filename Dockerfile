FROM php:8.2-fpm

# Argumentos para o usuário do sistema
ARG user
ARG uid

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Instala extensões PHP (incluindo pdo_pgsql para PostgreSQL)
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    sockets \
    pdo_pgsql

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Cria um usuário para executar comandos Artisan/Composer
RUN useradd -G www-data,root -u $uid -d /home/$user $user && \
    mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Instala Redis via PECL
RUN pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis

# Define diretório de trabalho
WORKDIR /var/www

# Copia configurações PHP personalizadas
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Usa o usuário não-root
USER $user
