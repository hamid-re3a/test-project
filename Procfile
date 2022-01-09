web: vendor/bin/heroku-php-apache2 public/
worker: composer update && php artisan migrate --force &&  php artisan db:seed --force
