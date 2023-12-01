===================To Start Docker Desktop===================
1. systemctl --user start docker-desktop

======================= to up project on docker ================

1. docker-compose up -d --build
2. docker-compose exec app bash
3. chmod 777 storage/ -R
4. chmod 777 bootstrap/cache -R
5. php artisan key:generate
6. php artisan db:seed

