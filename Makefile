install:
	@cp .env.example temp.env
	@sed -i '' '/DB_.*HOST/s/=.*/=db/g' temp.env
	@sed -i '' '/DB_.*DATABASE/s/=.*/=default/g' temp.env
	@sed -i '' '/DB_.*PASSWORD/s/=.*/=root/g' temp.env
	@mv temp.env .env
	@docker-compose up -d
	@docker-compose exec app composer install
	@docker-compose exec app php artisan key:generate
	@docker-compose exec app php artisan migrate:refresh --seed
	@docker-compose exec app php artisan test
