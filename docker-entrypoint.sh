#!/bin/bash
set -e

# Run migrations (force, no interactive confirmation)
php artisan migrate --force

# Start Apache in foreground (provided by the base image)
exec apache2-foreground
