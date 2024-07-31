<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

#### Перейти в каталог проекта:

    cd src

#### Сконфигурировать файл .env

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=larabase
    DB_USERNAME=root
    DB_PASSWORD=root

#### Получить APP_KEY:

    make key

#### Собрать все образы Docker:

    make build

#### Запустить приложение:

    make up

#### Остановить приложение

    make down

#### Приложение доступно на локальном компьютере по адресу:

    localhost/products

#### Доступные маршруты в браузере:

GET /products - список товаров

GET /products/{product} - получить товар по ID

GET /products/create - страница загрузки xls-списка товаров




