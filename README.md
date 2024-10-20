# Lumina CMS

A lightweight CMS based on Laravel and SQLite. Aspiring to make it as simple and fast as possible, while still providing the necessary features for a basic CMS.

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

6. Generate an application key.

```bash
php artisan key:generate
```

7. Run the migrations.

```bash
php artisan migrate
```

8. Seed the database with random data.

```bash
php artisan db:seed
```

9. Build the frontend.

```bash
nmp install && npm run build
```

10. Serve the application.

```bash
php -S localhost:8000 -t public
```

## Development

### IxDF Coding Standard for Laravel

To run checks only:

```bash
composer cs:check
```

To automatically fix many CS issues:

```bash
composer cs:fix
```

### Recreate the default database

**NOTE:** This will delete all data and recreate the default database with dummy data.

```bash
rm database/database.sqlite && touch database/database.sqlite && php artisan migrate && php artisan db:seed
```

## Dependencies

- Composer
- PHP >= 8.2
- PHP Sqlite3 extension (`php-sqlite3`).
