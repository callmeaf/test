# Project Setup

Follow these steps to get the project running after cloning the repository.

All commands except the first one should be run **inside the Laravel Sail container shell**.

```bash
# 1. Start Docker containers (from your host machine)
./vendor/bin/sail up -d

# 2. Enter the container shell
./vendor/bin/sail shell

# 3. Setup the application (inside the container shell)
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
