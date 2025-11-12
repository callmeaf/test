## Steps after clone

- ./vendor/bin/sail up -d
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed 
