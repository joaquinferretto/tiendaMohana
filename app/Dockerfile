# Usa PHP con Apache
FROM php:8.2-apache

# Instala dependencias del sistema
RUN apt-get update && \
    apt-get install -y \
        git \
        zip \
        unzip \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        libpq-dev \
        libjpeg-dev \
        libfreetype6-dev && \
    docker-php-ext-install pdo pdo_mysql zip gd

# Habilita mod_rewrite de Apache (necesario para Laravel)
RUN a2enmod rewrite

# Instala Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Copia tu proyecto al contenedor
COPY . /var/www/html

# Da permisos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html/storage

# Configura el DocumentRoot de Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Instala dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Genera key si no existe
RUN php artisan key:generate || true

# Expone el puerto
EXPOSE 80

# Comando default
CMD ["apache2-foreground"]
