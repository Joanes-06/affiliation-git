# Utiliser une image PHP officielle avec les extensions nécessaires
FROM php:8.1-cli

# Installer Composer et les extensions nécessaires
RUN apt-get update && apt-get install -y unzip curl libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers du projet dans le conteneur
COPY . .

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Donner les permissions aux fichiers Laravel
RUN chmod -R 777 storage bootstrap/cache

# Exposer le port 8000
EXPOSE 8000

# Lancer l’application Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]