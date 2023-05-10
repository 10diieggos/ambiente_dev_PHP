# Imagem base para a aplicação PHP
FROM php:7.4-apache

# Instala as extensões necessárias para o MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia os arquivos da aplicação para o diretório de trabalho do Apache
COPY . /var/www/html/

# Configura o Apache
RUN a2enmod rewrite
