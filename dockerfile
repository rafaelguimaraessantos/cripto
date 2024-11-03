# Dockerfile
FROM php:8.2-fpm

# Instalar dependências e extensões
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql zip

RUN apt-get update && apt-get install -y \
    curl \
    && curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Configurar o diretório de trabalho
WORKDIR /var/www

# Copiar o composer para o contêiner
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
