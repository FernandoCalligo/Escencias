# Usa una imagen oficial de PHP con Apache
FROM php:8.0-apache

# Copia los archivos del proyecto al directorio de trabajo de Apache
COPY . /var/www/html/

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite

# Expone el puerto 80
EXPOSE 80
