# Utiliser l'image PHP en tant que base
FROM php:8.2-fpm

# Mettre à jour les dépôts et installer les paquets nécessaires
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances de l'application
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install

# Définir les variables d'environnement
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS="0" \
    PHP_OPCACHE_MAX_ACCELERATED_FILES="10000" \
    PHP_OPCACHE_MEMORY_CONSUMPTION="192" \
    PHP_MEMORY_LIMIT="256M"

# Exposer le port 9000 pour écouter les demandes PHP
EXPOSE 8023

# Démarrer le processus PHP-FPM
CMD ["php-fpm"]