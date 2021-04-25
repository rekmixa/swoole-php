up:
	@docker-compose up -d --build --remove-orphans

install: dotenv-config up composer-install

down:
	@docker-compose down

down-v:
	@docker-compose down -v

stop:
	@docker-compose stop

restart:
	@docker-compose restart

env:
	@docker-compose exec --user=www-data php bash

env-root:
	@docker-compose exec php bash

dotenv-config:
	@test -f .env || cp .env-dist .env

composer-install:
	@docker-compose run --rm php composer install
