<?php

namespace Helpers;

class Parser
{
    /**
     * @return array|null
     */
    public static function parseUrlQuery(): ?array
    {
        $queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

        if (is_null($queryString)) {
            return null;
        }

        parse_str($queryString, $query);

        return $query;
    }
}