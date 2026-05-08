FROM php:8.2-apache

# Устанавливаем драйвер для работы с MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql


# Копируем файлы сайта в контейнер (если не используешь volumes)
COPY . /var/www/html/
