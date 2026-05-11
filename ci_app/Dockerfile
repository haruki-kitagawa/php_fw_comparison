FROM php:8.3-fpm

# 必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libicu-dev \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP拡張機能のインストール（CI4はintlとmysqliが重要）
RUN docker-php-ext-install \
    pdo_mysql \
    mysqli \
    mbstring \
    intl \
    zip

# CI4用：Node.jsはあえて入れない（シンプルさを維持）

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]