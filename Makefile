include .env

DC = docker compose -f docker-compose.yml
PWD = $(shell pwd)
PHP_DEBUG_OFF = -e XDEBUG_MODE=off -e APP_DEBUG=0
PHP = $(DC) run --rm php-fpm
NGINX = $(DC) run --rm nginx
ARTISAN = $(PHP) php artisan
COMPOSER = $(PHP) composer

info:
	@echo ----------------------- DEVELOPMENT INFO ------------------------------
	@echo Приложение доступно на:
	@echo ${APP_URL}:${APP_PORT}/
	@echo
	@echo Базовые команды:
	@echo make
	@echo    start                      - запустить контейнеры
	@echo    stop                       - остановить контейнеры
	@echo    restart                    - перезапустить контейнеры
	@echo    rebuild                    - пересобрать контейнеры
	@echo    db-migrate                 - выполнить миграции
	@echo    cache-clear                - очистить кеш приложения

start: app-start
stop: app-stop
restart: app-stop app-start
rebuild: app-stop dc-build app-start

init: dc-build composer-install app-start key-create db-migrate-fresh-seed symlinks-update

app-start:
	$(DC) up -d

app-stop:
	$(DC) down --remove-orphans

cache-clear:
	$(ARTISAN) cache:clear
	$(ARTISAN) config:clear
	$(ARTISAN) route:clear

composer-install:
	$(COMPOSER) install --no-cache

db-migrate:
	$(ARTISAN) migrate

dc-build:
	$(DC) build

sh-nginx:
	$(NGINX) sh

sh-php:
	$(PHP) sh -l

symlinks-update:
	$(ARTISAN) storage:link
