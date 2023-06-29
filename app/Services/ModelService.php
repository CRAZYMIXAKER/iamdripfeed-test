<?php

namespace App\Services;

class ModelService
{
    /**
     * @param array $data
     * @param array $fields
     * @return array
     */
    public static function getFieldValues(array $data, array $fields): array
    {
        return array_map(static function($obj) use ($fields) {
            return self::processFields($obj, $fields);
        }, $data);
    }

    /**
     * @param array $obj
     * @param array $fields
     * @return array
     */
    public static function processFields(array $obj, array $fields): array
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