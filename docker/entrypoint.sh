#!/bin/sh

set -e #lorsqu'une commande échoue d'arrêcter l'exécution des commande en cour

echo "Préparation de laravel en cour ..." #Afficher un message a l'utilisateur

php artisan optimize:clear #sert a vider le cache  de notre projet lavarel

php artisan migrate --force 

echo "Opération réussir avec succès..."

exec "$@" 