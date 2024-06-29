.PHONY: build up up-d down

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

setup:
	@if [ ! -d "node_modules" ]; then \
		echo "node_modules tidak ditemukan. Menjalankan npm install..."; \
		npm install; \
	else \
		echo "node_modules sudah ada. Melewati npm install."; \
	fi
	@if [ ! -d "vendor" ]; then \
		echo "vendor tidak ditemukan. Menjalankan composer install..."; \
		composer install; \
	else \
		echo "vendor sudah ada. Melewati composer install."; \
	fi
	php artisan storage:link

run:
	php artisan migrate:fresh --seed
	php artisan serve

