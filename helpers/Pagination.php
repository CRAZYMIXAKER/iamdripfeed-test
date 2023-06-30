<?php

namespace Helpers;

class Pagination
{
    /**
     * @param array $array
     * @param int $perPage
     * @return array|null
     */
    public static function run(array $array, int $perPage): ?array
    {
        $countPage = ceil(count($array) / $perPage);
        $page = (int)(Parser::parseUrlQuery()['page'] ?? 1);

        if (!$page || $page < 0 || $page > $countPage) {
            return null;
        }

        $resultArray = array_slice($array, $perPage * ($page - 1), $perPage);

        return [
            'result_array' => $resultArray,
            'page_array' => [
                'count_page' => $countPage,
                'page' => $page
            ]
        ];
    }
}