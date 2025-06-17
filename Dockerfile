# Dockerfile
FROM php:8.2-apache

# 1. Instalo dependencias y habilito pdo_mysql
RUN apt-get update \
    && docker-php-ext-install pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# 2. (Opcional) habilitar mod_rewrite si lo necesitas
RUN a2enmod rewrite
