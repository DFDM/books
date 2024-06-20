<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Books
<p align="center">
1 - Нужны: 
Две базы данных Рабочая и Тестовая (для тестов собственно)
-- В .env указывается рабочая
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=library
DB_USERNAME=librarian
DB_PASSWORD=root

-- В .env.testing указывается тестовая 
(
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=library_test
DB_USERNAME=postgres
DB_PASSWORD=root
)

Не стал убирать из git эти файлы, тк тестовый проект (на рабочем разумеется такого не будет)

2 - Запустить composer intall

3 - Запустить в отдельной консоли npm run dev

4 - Запустить в отдельной консоли php artisan serve --port:3000
</p>

