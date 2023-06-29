<?php

namespace App\Services;

class ModelService
{
    public static function getFieldValues($data, $fields): array
    {
        return array_map(static function($obj) use ($fields) {
            return self::processFields($obj, $fields);
        }, $data);
    }

    public static function processFields($obj, $fields): array
    {
        $result = [];
        foreach ($fields as $field => $subfields) {
            if (is_array($subfields)) {
                $nestedData = $obj[$field] ?? null;
                if (is_array($nestedData)) {
                    $result[$field] = self::processFields($nestedData, $subfields);
                }
            } else {
                $result[$subfields] = $obj[$subfields] ?? null;
            }
        }
        return $result;
    }
}