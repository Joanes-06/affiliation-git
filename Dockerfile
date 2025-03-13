# Utiliser une image PHP officielle avec les extensions nécessaires
FROM php:8.1-cli

# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    unzip curl git libpq-dev libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring gd

# Installer Composer proprement
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Installer Node.js et NPM (si nécessaire pour Laravel Mix)
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers du projet dans le conteneur
COPY . .

# Installer les dépendances PHP avec Composer
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction --optimize-autoloader

# Compiler les assets (si applicable)
RUN if [ -f package.json ]; then npm install && npm run build; fi

# Donner les permissions correctes
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Exposer le port que Render définit dynamiquement
EXPOSE 8000

# Lancer Laravel avec la bonne variable de port
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT:-8000}"]