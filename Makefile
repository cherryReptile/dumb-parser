#!make

init:
	bash bin/init.sh
build:
	docker-compose up --build -d
	@make status
up:
	docker-compose pull
	docker-compose up -d
	@make status
status:
	docker-compose ps
down:
	docker-compose stop
exec:
	docker-compose exec app bash
rm:
	docker-compose rm
exec.nginx:
	docker-compose exec nginx /bin/sh
network.down:
	@make down
	docker network prune
remove.all:
	docker system prune -a
composer:
	docker-compose exec app composer install
