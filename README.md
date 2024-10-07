# Lumina CMS

A lightweight CMS based on [Lumen](https://lumen.laravel.com/) and SQLite. Aspiring to make it as simple and fast as possible, while still providing the necessary features for a basic CMS.

Work in progress.

## Installation

1. Clone the repository.

```bash
git clone git@github.com:csisztaiarnold/lumina.git && cd lumina
```

2. Install the composer dependencies.

```bash
composer install
```

3. Create a database file: `database/database.sqlite`

```bash
touch database/database.sqlite
```

4. Create an `.env` file.

```bash
cp .env.example .env
```

5. Change the `DB_DATABASE` value in `.env` to the relative path of the database file.


6. Run the migrations.

```bash
php artisan migrate
```

7. Seed the database with random data.

```bash
php artisan db:seed
```

8. Serve the application.

```bash
php -S localhost:8000 -t public
```

## Dependencies

- Composer
- PHP >= 8.2
- PHP Sqlite3 extension (`php-sqlite3`).
