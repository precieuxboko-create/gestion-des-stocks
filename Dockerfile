# Version de PHP
FROM php:8.4-cli

# Installation des dépendances système et extensions PHP
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libicu-dev \
        libonig-dev \
        libzip-dev \
    && docker-php-ext-install \
        bcmath \
        intl \
        mbstring \
        pdo_mysql \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installation de Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Dossier de travail
WORKDIR /var/www/html

# Copier l'entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh

# Donner les droits d'exécution
RUN chmod +x /usr/local/bin/entrypoint.sh

# Copier le projet Laravel
COPY . .

# Installer les dépendances PHP
RUN composer install \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# Permissions Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Port Laravel
EXPOSE 8000

# Entrypoint
ENTRYPOINT ["entrypoint.sh"]

# Commande exécutée par l'entrypoint
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]