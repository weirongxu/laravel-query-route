<?php

namespace Weirongxu\LaravelQueryRoute;

use Illuminate\Support\Facades\Config;

class Request extends \Illuminate\Http\Request
{
    public function getPathInfo()
    {
        return $this->query->get(Config::get('query-route.query_name'), parent::getPathInfo());
    }
}
