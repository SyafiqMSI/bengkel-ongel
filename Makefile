.PHONY: build up up-d down

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

setup:
	npm install
	composer install
	php artisan storage:link
run:
	php artisan migrate:fresh --seed
	php artisan serve

