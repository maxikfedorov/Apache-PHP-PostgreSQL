FROM php:8.1.1-apache

RUN apt-get update -y

# Устанавливаем необходимые пакеты для работы с PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev

# Устанавливаем необходимые расширения PHP
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Устанавливаем переменную окружения для порта СУБД
ENV DB_PORT=5432

# Добавляем метаданные об авторе и группе студента
#docker inspect practice-3-system --format='{{json .Config.Labels}}'
LABEL author="ФЕДОРОВ МАКСИМ АЛЕКСАНДРОВИЧ"
LABEL group="ИКБО-16-20"

# Выводим сообщение с ФИО студента после запуска сервиса
ONBUILD RUN echo "Сборка и запуск произведены. Автор: ФЕДОРОВ МАКСИМ АЛЕКСАНДРОВИЧ"