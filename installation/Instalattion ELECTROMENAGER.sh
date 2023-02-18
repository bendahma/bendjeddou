cd C:
mkdir BENDJEDDOU_ELECTROMENAGER
cd BENDJEDDOU_ELECTROMENAGER
git clone https://github.com/bendahma/LaraGest.git .
composer install
cp .env.example .env
php artisan key:generate
touch ./database/database.sqlite
php artisan migrate:fresh --seed 