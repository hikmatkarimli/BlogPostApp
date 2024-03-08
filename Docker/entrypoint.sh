#!/bin/bash

# Install PHP dependencies using Composer
composer install

# Run database migrations (if needed)
php artisan migrate

# Run additional setup commands if necessary

# Start Apache server
apache2-foreground