# Utiliser une image PHP officielle avec les extensions nécessaires
FROM php:8.1-cli

# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    unzip curl git libpq-dev libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring gd

# Installer Composer proprement
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier uniquement composer.json et composer.lock avant installation
COPY composer.json composer.lock ./

# Nettoyer le cache Composer
RUN composer clear-cache

# Installer les dépendances PHP avec Composer
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction --optimize-autoloader || composer update --no-dev --prefer-dist --no-progress --no-interaction

# Copier le reste du projet
COPY . .

# Vérifier les extensions installées
RUN php -m

# Compiler les assets si applicable
RUN if [ -f package.json ]; then npm install && npm run build; fi

# Donner les permissions correctes
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Exposer le port défini dynamiquement par Render
EXPOSE 8000

# Lancer Laravel avec la bonne variable de port
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT:-8000}"]