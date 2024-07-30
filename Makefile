build:
	docker compose build

up:
	docker compose up -d

migrate:
	php artisan migrate

down:
	docker compose down
