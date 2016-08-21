<?php

namespace Weirongxu\LaravelQueryRoute;

use InvalidArgumentException;
use Illuminate\Support\Facades\Config;

class UrlGenerator extends \Illuminate\Routing\UrlGenerator
{
    public function route($name, $parameters = [], $absolute = true)
    {
        if (! is_null($route = $this->routes->getByName($name))) {
            $uri = $this->replaceRouteParameters($route->uri(), $parameters);
            if ($uri !== '') {
                $parameters[Config::get('query-route.query_name')] = $uri;
            }
            $root = $this->routes->getRoutesByMethod()['GET']['/'];
            return $this->toRoute($root, $parameters, $absolute);
        }

        throw new InvalidArgumentException("Route [{$name}] not defined.");
    }

}
