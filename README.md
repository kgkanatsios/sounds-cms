# Sound file management

This web application was developed using [Laravel framework](https://laravel.com/)

## Server Requirements

In the following link you can read the server requirements.
[https://laravel.com/docs/7.x/installation#server-requirements](https://laravel.com/docs/7.x/installation#server-requirements)

## Installation

```sh
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

## Initial Configuration

1. Set the value of `DB_HOST` variable.
2. Set the value of `DB_DATABASE` variable.
3. Set the value of `DB_USERNAME` variable.
4. Set the value of `DB_PASSWORD` variable.

## Running Migrations

```sh
$ php artisan migrate
```

## Local Development Server

Artisan command will start a development server at http://localhost:8000

```sh
$ php artisan serve
```
