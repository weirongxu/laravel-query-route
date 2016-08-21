# laravel-query-route

laravel5 routing into url's query

Its useful when you can not use `.htaccess`

Some url transform examples
* `http://localhost:8000/path` to `http://localhost:8080/?_=/path`
* `http://localhost/path/to/?a=1&b=2` to `http://localhost/?a=1&b=2&_=/path/to/`

## Installation

Install with composer

```bash
composer require weirongxu/laravel-query-route
```
  
Add the service provider to `app/config/app.php`
> Note: The `App\Providers\RouteServiceProvider::class` must before this provider

```php
Weirongxu\LaravelQueryRoute\ServiceProvider::class,
```

Use the `Weirongxu\LaravelQueryRoute\Request` replace laravel's request in `public/index.php`

```php
$response = $kernel->handle(
    // $request = Illuminate\Http\Request::capture()
    $request = Weirongxu\LaravelQueryRoute\Request::capture()
);
```

Generate package config by the publish command

```bash
php artisan vendor:publish --provider="Weirongxu\\LaravelQueryRoute\\ServiceProvider" --tag config
```
