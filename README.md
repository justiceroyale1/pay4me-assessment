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
git clone https://github.com/justiceroyale1/pay4me-accessment.git
```

### Backend Setup

1. Open a terminal and cd into the root directory with the following command

```sh
cd pay4me-accessment
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

8. Start the backend server with the following command

```sh
php artisan serve
```

9. Take note of the backend's URL.

### Frontend Setup

1. Open another terminal and cd into the root directory with the following command

```sh
cd coamana-coding-challenge
```

2. CD into the backend directory with the following command

```sh
cd frontend
```

3. Install the dependencies with the following command

```sh
npm install
```

4. If the `.env` file has not been created, then create it with the following command

```sh
cp .env.example .env
```

5. Update the following values in the `.env` file to match yours. **This should match your backend url**

```
NUXT_PUBLIC_SANCTUM_BASE_URL='http://localhost:8000'
```

6. Start the frontend server with the following command

```sh
npm run dev
```

7. Open the app on your browser. Or you can click [here](http://localhost:3000).

## Testing

Create a database called `coamana_test_schema` on MySQL.

Update the following values in the `/backend/.env.testing` file to match yours:

```
DB_DATABASE=coamana_test_schema
DB_USERNAME=dbadmin
DB_PASSWORD=password
```

Open another terminal in your root directory and cd into the backend directory with the following command:

```sh
cd backend
```

Run the tests with the following command:

```sh
php artisan test
```
