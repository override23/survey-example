Server requirements:
* requirements for Laravel 7.x project https://laravel.com/docs/7.x#installing-laravel should be met
* installed git client

1.Clone project from repository
```bash
#using SSH
git clone git@github.com:override23/survey-example.git

#or using HTTPS
git clone https://github.com/override23/survey-example.git
```
2.Get into project directory and run
```bash
composer install
```
3.Copy .env.example to .env and adjust relevant settings (eg. DB connection credentials, mail settings...)
4.Generate your app key
```bash
php artisan key:generate
```
5.Run migrations with seeds
```bash
php artisan migrate --seed
```
