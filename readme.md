# laravel-query-route

Change laravel5 routing into query

Its useful when you can not use `.htaccess`

Some url transform examples
* `http://localhost:8000/path` to `http://localhost:8080/?_=/path`
* `http://localhost/path/to/?a=1&b=2` to `http://localhost/?a=1&b=2&_=/path/to/`

## Installation

Install with composer

```bash
composer require weirongxu/laravel-query-route
```

### Add the service provider to `config/app.php`

```php
<?php
Weirongxu\LaravelQueryRoute\ServiceProvider::class,
// Note: The `App\Providers\RouteServiceProvider::class` must before this provider
```

### Use the `Weirongxu\LaravelQueryRoute\Request` replace laravel request in `public/index.php`

```php
<?php
$response = $kernel->handle(
    // $request = Illuminate\Http\Request::capture()
    $request = Weirongxu\LaravelQueryRoute\Request::capture()
);
```

### Generate package config by the publish command

```bash
php artisan vendor:publish --provider="Weirongxu\\LaravelQueryRoute\\ServiceProvider" --tag config
```

## Configuration
the underscore path indicator "_" can be customized in config/query-route.php.
Set query_name to "rpath" for example:
* `http://localhost/path/to/?a=1&b=2` to `http://localhost/?a=1&b=2&rpath=/path/to/`

