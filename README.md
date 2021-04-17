# Login and logout in PHP

This is a project/application to create a login and logout system with PHP.

## Requirement

* php 7.4 and above
* composer
* mysql
* pdo_mysql driver

## Installation

Go to github and click on fork (at the top right most corner) to make a copy into your personal account

```bash
git clone https://github.com/yourUsername/welcome_me.git
```

```bash
cd to/the/project
```

```bash
composer install
```

Copy .env.example to .env

Change the configuration in .env to your database credentials

Create a database for the project
> How to can be found in migrations/00_setup_database.sql

Create users table in the database
> How to can be found in migrations/01_users_table.sql

while in the project directory run
```bash
php -S localhost:8000 -t public
```

Open your browser and enter http://localhost:8000

If should see the application ready to go

## Knowledge and understanding

You should go through the files in the publish directory and read the comment. If any other issues or clarification, you can reach out to me.

## Demo

The application is live on https://well-it-me.herokuapp.com/

## Extenal Libraries used to make it simple

* dibi https://dibiphp.com/
* phpdotenv https://github.com/vlucas/phpdotenv
