
## About

```
git clone https://github.com/dralexsand/usersurf.git

cd usersurf 

cp .env.example .env

composer require laravel/sail --dev

php artisan sail:install --devcontainer

Check [1] pgsql

alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

cp docker-compose.yml docker-compose.sail.yml
cp docker-compose.docker.yml docker-compose.yml

sail up

Open another terminal tab: 

docker exec stat_app composer install -o
docker exec stat_app npm install

```

App running on:

http://127.0.0.1:8093
