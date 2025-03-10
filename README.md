## COAMANA CODING CHALLENGE

This project was created in fulfillment of the requirements for the role of fullstack developer at [COAMANA](https://coamana.com/).

## Requirements

Before you setup the app, make sure you have the following installed

- [PHP v8.3](https://www.php.net/downloads)
- [Node / NPM](https://nodejs.org/en/download/package-manager)
- [MySQL](https://www.mysql.com/downloads/)
- [Composer](https://getcomposer.org/download/)

Also, create two databases called `pay4me_schema` and `pay4me_test_schema` on MySQL.

## Setup

Clone the repo with the following command:

```sh
git clone https://github.com/justiceroyale1/pay4me-assessment.git
```

### Configuration

1. Open a terminal and cd into the app directory with the following command

```sh
cd pay4me-assessment
```

2. Install the dependencies with the following command

```sh
composer install
```

3. If the `.env` file has not been created, then create it with the following command

```sh
cp .env.example .env
```

5. Update the following values in the `.env` file to match yours

```
DB_DATABASE=pay4me_schema
DB_USERNAME=root
DB_PASSWORD=
```

If you did NOT create the `pay4me_schema` database, you can use a value of your choosing for `DB_DATABASE`

6. Run migrations with the following command

```sh
php artisan migrate
```

7. Run database seeders with the following command

```sh
php artisan db:seed
```

8. Start the app server with the following command

```sh
php artisan serve
```

9. Take note of the app's URL. It should be [http://localhost:8000](http://localhost:8000). If yours is different update the ```APP_URL=http://localhost:8000``` variable in the `.env` to match.

## Testing

1. If the `.env.testing` file has not been created, then create it with the following command

```sh
cp .env.testing.example .env.testing
```

```
DB_DATABASE=pay4me_test_schema
DB_USERNAME=root
DB_PASSWORD=
```
If you did NOT create the `pay4me_test_schema` database, you can use a value of your choosing for `DB_DATABASE`. If you choose a different value for the test database, make sure it's different main `DB_DATABASE` above.


2. Open another terminal cd into the app's directory with the following command:

```sh
cd pay4me-assessment
```

3. Run the tests with the following command:

```sh
php artisan test
```
