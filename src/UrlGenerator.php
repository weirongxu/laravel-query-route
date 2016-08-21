<?php

namespace Weirongxu\LaravelQueryRoute;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Arr;
use Exception;

class UrlGenerator extends \Illuminate\Routing\UrlGenerator
{
    public function parseQueryRoute($url) {
        $purl = parse_url($url);
        if (isset($purl['query'])) {
            parse_str($purl['query'], $query);
        } else {
            $query = [];
        }
        if (($path = Arr::get($purl, 'path', '')) !== '') {
            $query[Config::get('query-route.query_name', '_')] = $path;
        }
        return Arr::get($purl, 'scheme', 'http') . '://'
            . Arr::get($purl, 'host', '')
            . (isset($purl['port']) ? ':'.$purl['port'] : '')
            . '/'
            . (count($query) ? '?'.http_build_query($query) : '')
            . (isset($purl['fragment']) ? '#'.$purl['fragment'] : '');

    }

    public function current() {
        return $this->parseQueryRoute(parent::current());
    }

    public function to($path, $extra = [], $secure = null) {
        return $this->parseQueryRoute(parent::to($path, $extra, $secure));
    }

    public function secure($path, $parameters = []) {
        return $this->parseQueryRoute(parent::secure($path, $parameters));
    }

    public function asset($path, $secure = null) {
        return $this->parseQueryRoute(parent::asset($path, $secure));
    }

    public function route($name, $parameters = [], $absolute = true) {
        return $this->parseQueryRoute(parent::route($name, $parameters, $absolute));
    }

    public function action($action, $parameters = [], $absolute = true) {
        return $this->parseQueryRoute(parent::action($action, $parameters, $absolute));
    }
}
