<?php


namespace slavkluev\Bizon365\Helpers;

class UrlHelper
{
    public static function build(string $url, array $params)
    {
        $query = http_build_query($params);
        return empty($query) ? $url : implode('?', [$url, $query]);
    }
}
