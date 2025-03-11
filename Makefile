.PHONY: up down install test seed

up:
	./vendor/bin/sail up -d

down:
	./vendor/bin/sail down

install:
	cp .env.example .env || true
	./vendor/bin/sail up -d
	./vendor/bin/sail composer install
	./vendor/bin/sail artisan migrate
	./vendor/bin/sail artisan key:generate

test:
	./vendor/bin/sail test

seed:
	./vendor/bin/sail artisan db:seed
