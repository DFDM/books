
## О проекте Книги

**Создать в PostgreSQL, две базы данных: Рабочую и Тестовую** (для выполнения тестов)

- В `.env` указывается рабочая:

DB_CONNECTION=pgsql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=5432<br>
DB_DATABASE=library<br>
DB_USERNAME=librarian<br>
DB_PASSWORD=root<br>

- В `.env.testing` указывается тестовая:

DB_CONNECTION=pgsql <br>
DB_HOST=127.0.0.1<br>
DB_PORT=5432<br>
DB_DATABASE=library_test<br>
DB_USERNAME=postgres<br>
DB_PASSWORD=root<br>

Файлы `.env` не были удалены из git, так как это тестовый проект (в рабочем проекте, разумеется, такого не будет).

2 - Запустить `composer install`

3 - Запустить `npm install`

4 - Запустить в отдельной консоли `npm run dev`

5 - Запустить в отдельной консоли `php artisan serve --port 3000`

### API Документация:
http://127.0.0.1:3000/api/documentation#/

### WEB:
- Вход:
http://127.0.0.1:3000/

- Основные роуты:<br>
http://127.0.0.1:3000/admin/books <br>
http://127.0.0.1:3000/admin/authors <br>
http://127.0.0.1:3000/admin/buyers <br>
http://127.0.0.1:3000/admin/sales <br>

### Запуск тестов:
`php artisan test`
