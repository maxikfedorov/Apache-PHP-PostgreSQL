FROM php:8.1.1-apache

RUN apt-get update -y

# Устанавливаем необходимые пакеты для работы с PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev

# Устанавливаем необходимые расширения PHP
RUN docker-php-ext-install pdo pdo_pgsql pgsql
