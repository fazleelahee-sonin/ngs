# New Generation Streaming Serivce

# Setup with docker
I have created a Make file to make setup easy - if you have a docker install in the system. It will create and update .env file, build up the docker container, install composer, run the migration and run the tests.


Note: makefile developed and tested in the Mac OS. Technically it should work in Linux or WSL.

# Setup without make

If some reason fail to setup with make command or not supported, please take the following step to up and running the docker conatiner.

- Copy .env.example to .env

change the Database details:

```
DB_CONNECTION=mysql
DB_HOST=ngs_db
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=root
DB_PASSWORD=root
```

- Docker up
```
docker-compose up -d
```

- Install composer
```
docker-compose exec ngs_app composer install
```

- Geerate Key for the laravel
```
docker-compose exec ngs_app php artisan key:generate
```  

- Migrate database
```
docker-compose exec ngs_app php artisan migrate:refresh --seed
```

- Run the tests to check application working as expected.
```
docker-compose exec ngs_app php artisan test
```


