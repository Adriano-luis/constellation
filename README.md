# Constellation Test

## Requirements

PHP 8.3+
Apache 2
MariaDB or MySQL
Composer
PHP PDO MySQL extension

## Installation

Clone the project:

```bash
git clone <repository-url>
cd constellation
```

Install Composer dependencies/autoload:

```bash
composer install
```

## Database

Create database:

```sql
CREATE DATABASE constellation
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;
```

Create table:

```sql
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(320) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT users_pk PRIMARY KEY (id),
    CONSTRAINT users_email_unique UNIQUE (email)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
```

## Configuration

Update the database credentials in your config/environment file:

```php
define("BASE_URL", "http://localhost:8080/");

define("DBHOST", "127.0.0.1");
define("DBPORT", "3306");
define("DBNAME", "constellation");
define("DBUSER", "root");
define("DBPASS", "root");
```

## Run the project

Open in the browser:

```text
http://localhost:8080
```

## Tests

Run PHPUnit:

```bash
vendor/bin/phpunit
```

Run coverage, if Xdebug is installed:

```bash
XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html coverage
```

But a coverage file is already present at coverage folder.
