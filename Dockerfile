FROM php:7.2-apache

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install wget firebird-dev -y

RUN docker-php-ext-install pdo pdo_firebird interbase

RUN a2enmod rewrite
