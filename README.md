## HOW TO INSTALL

To install the app follow these steps:

1. Clone the Git repo:

  ```
  git clone git@github.com:edulazaro/api-rest-laravel.git
  ```

2. Install **composer** packages:

  ```
  composer install
  ```

3. Install **npm** packages:

  ```
  npm install
  ```

4. Copy the `.env.example` file located in the root folder and name it as `.env`.

5. Generate the App key by using the next command:

  ```
  php artisan key:generate
  ```

6. Create da database in MySQL, configure the database details in the `.env` file and then run database migrations with the next command:

  ```
  php artisan migrate
  ```

## HOW TO START

For development or for easily test the application, use the command `php artisan serve` to start the dev server and the command `npm run watch` to watch for changes.

For production you need to use apache or nginx, configuring the directory `/public` base folder of the app in the server configuration. Use the command `npm run prod` to compile and minimize the scss and the JS files.

## HOW TO USE

Some endpoints require to register and login. To Register you need to create a **POST** request to the endpoint `/api/register` with the `name`, the `email` and `password` you want to use. Here is an example:

```json
{
    "name": "eduardo",
    "email":  "my@email.com",
    "password": "example"
}
```

Session will be started after registering and you will get back a bearer token. The bearer token must be sent along with any request requiring user login. Here is an example response:

```json
{
    "success": true,
    "data": {
        "access_token": "1|kCRA2JmEaBOEMByn9rWgM9jgpkSHBtZ4czKhJEdq",
        "token_type": "Bearer"
    }
}
```

You can login via a **POST** request to the endpoint `/api/register` with the `name`, the `email` and `password` you want to use. Here is an example:

```json
{
    "email":  "my@email.com",
    "password": "example"
}
```

This is an example response you will get:

```json
{
    "success": true,
    "data": {
        "access_token": "2|25s7Jxa8XPsZajhI2sznmWSUgGTpL3W5hF2SuOw7",
        "token_type": "Bearer"
    }
}
```

Once you have the bearer token you can create messages but just sending the content of the message in a **POST** request to the endpoint `/api/login`:

```json
{
    "content": "test message"
}
```

This is an example response of a valid message:

```json
{
    "success": true,
    "data": {
        "user_id": 1,
        "content": "test message",
        "updated_at": "2021-06-29T18:08:34.000000Z",
        "created_at": "2021-06-29T18:08:34.000000Z",
        "id": 1
    }
}
```

To get







