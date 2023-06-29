<?php

namespace App\Models;

use App\Services\ModelService;
use System\Database\FileDatabaseInterface;

class Model
{
    protected static FileDatabaseInterface $db;
    protected static string $table;
    protected static array $fillable;

    /**
     * @param FileDatabaseInterface $database
     * @return void
     */
    public static function setDb(FileDatabaseInterface $database): void
    {
        static::$db = $database;
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public static function get(array $fields = []): ?array
    {
        $data = static::$db->read(static::$table);

        if (!$data) {
            return null;
        }

        if ($fields) {
            return ModelService::getFieldValues($data, $fields);
        }

        return $data;
    }

    /**
     * @param int $currencyId
     * @param array $fields
     * @return array|null
     */
    public static function find(int $currencyId, array $fields = ['*']): ?array
    {
        return null;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public static function create(array $params): mixed
    {
        return null;
    }
}