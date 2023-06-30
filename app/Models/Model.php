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
     * @param int $id
     * @return int|false
     */
    public static function delete(int $id): int|false
    {
        $data = array_values(array_filter(self::get(), static function ($item) use ($id) {
            return $item['id'] !== $id;
        }));

        return static::$db->update($data, static::$table);
    }

    /**
     * @param array $fields
     * @return int|false
     */
    public static function create(array $fields): int|false
    {
        $data = self::get();
        $newId = $data[count($data) - 1]['id'] + 1;
        $data[] = ['id' => $newId] + $fields;

        return static::$db->update($data, static::$table);
    }
}