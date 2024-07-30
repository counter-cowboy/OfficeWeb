#!/bin/bash

#migrate
php artisan migrate

php artisan storage:link

chmod 777 -R storage

php artisan queue:work