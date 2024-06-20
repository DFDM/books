
## О проекте Книги
1 - Создать в PostgreSQL 2 базы данных: 

**Две базы данных: Рабочая и Тестовая** (для тестирования)

- В `.env` указывается рабочая:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=library
DB_USERNAME=librarian
DB_PASSWORD=root

- В `.env.testing` указывается тестовая:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=library_test
DB_USERNAME=postgres
DB_PASSWORD=root

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

- Основные роуты:
http://127.0.0.1:3000/admin/books
http://127.0.0.1:3000/admin/authors
http://127.0.0.1:3000/admin/buyers
http://127.0.0.1:3000/admin/sales

### Запуск тестов:
`php artisan test`
