# Laravel ToDo App

This is a ToDo app with multiple user support.

It has been forked from a really good simple example:

https://github.com/milon/laravel-todo (A really good example to get started)

So far I have added features:

filtering by status

editing of tasks

subtasks 

## Installation

Clone the repository-
```
git clone https://github.com/rosscuk/laravel-todo
```

Then cd into the folder with this command-
```
cd laravel-todo
```

Then do a composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `todos` and then do a database migration using this command-
```
php artisan migrate
```

Then change permission of storage folder using thins command-
```
(sudo) chmod 777 -R storage
```

At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.




