# Warning

This is only for a dev setup on your local machine. Do not use this in production.

# Setup

Make sure Docker (or Docker on Desktop for Windows) is installed on your PC.

Docker comes with `docker compose` preinstalled.

The compose file defines all the services which are needed.

# Needed steps

* Extend the hosts file with the following: `127.0.0.1 laravel.test`
* Go to the app route and copy the .env.example to .env: `cp -f .env.example .env`
* Go to the folder above where you checked out the project: `cd ..`
* Create a symlink to the docker-compose.yml in the deployment folder: e.g. `ln -s breaking-timetable/deployment/docker-compose.yml docker-compose.yml` 
* Create a symlink to the Dockerfile in the deployment folder: e.g. `ln -s breaking-timetable/deployment/Dockerfile Dockerfile` 
* Create a symlink to the config folder in the deployment folder: e.g. `ln -s breaking-timetable/deployment/config config` 
* Pull all Docker containers: `docker compose pull`
* Build the Laravel app Docker container: `docker compose build`
* Start the Docker services: `docker compose up -d`
* Run the deployment command `docker compose exec app composer install`
* Run the deployment command `docker compose exec app php artisan key:generate`
* Run the deployment command `docker compose exec app npm run build:prod`

# Warning

This is only for a dev setup on your local machine. Do not use this in production.
