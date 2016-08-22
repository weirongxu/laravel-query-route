<?php

namespace Weirongxu\LaravelQueryRoute;

use Illuminate\Support\Facades\Config;

class Request extends \Illuminate\Http\Request
{
    public function getPathInfo()
    {
        $query_name = Config::get('query-route.query_name', '_');
        if (
            Config::get('query-route.enable', true)
            && $this->query->has($query_name)
        ) {
            $pathInfo = $this->query->get($query_name);
            $this->query->remove($query_name);
            return $pathInfo;
        } else {
            return parent::getPathInfo();
        }
    }
}
