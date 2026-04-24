FROM php:8.2-apache

# Устанавливаем драйвер для работы с MySQL
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Копируем файлы сайта в контейнер (если не используешь volumes)
COPY . /var/www/html/
