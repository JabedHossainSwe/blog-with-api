# Blog-with-API

Blog-with-API is a simple blog application with API functionality built using Laravel.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Contributing](#contributing)

## Prerequisites

Make sure you have the following software installed on your machine:

- [PHP](https://www.php.net/) (>= 7.4)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) or any other database supported by Laravel
- [Node.js](https://nodejs.org/) and [npm](https://www.npmjs.com/) (optional, only if you have frontend assets)

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/jabedhossainswe/blog-with-api.git
    ```

2. **Change into the project directory:**

    ```bash
    cd blog-with-api
    ```

3. **Install PHP dependencies:**

    ```bash
    composer install
    ```

4. **Copy the `.env.example` file to `.env`:**

    ```bash
    cp .env.example .env
    ```

5. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

6. **Configure your database in the `.env` file:**

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=blog
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7. **Migrate the database:**

    ```bash
    php artisan migrate
    ```

8. **(Optional) Seed the database with test data:**

    ```bash
    php artisan db:seed
    ```

9. **Install JavaScript dependencies:**

    ```bash
    npm install
    ```

10. **Compile frontend assets (if you have any):**

    ```bash
    npm run dev
    ```

## Usage

Run the development server:

```bash
php artisan serve
