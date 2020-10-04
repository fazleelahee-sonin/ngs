install:
	@cp ./src/.env.example ./src/temp.env
	@sed -i '' '/DB_.*HOST/s/=.*/=ngs_db/g' ./src/temp.env
	@sed -i '' '/DB_.*DATABASE/s/=.*/=default/g' ./src/temp.env
	@sed -i '' '/DB_.*PASSWORD/s/=.*/=root/g' ./src/temp.env
	@mv ./src/temp.env ./src/.env
	@docker-compose up -d
	@docker-compose exec ngs_app composer install
	@docker-compose exec ngs_app php artisan key:generate
	@docker-compose exec ngs_app php artisan migrate:refresh --seed
	@docker-compose exec ngs_app php artisan test
