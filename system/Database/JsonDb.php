<?php

namespace System\Database;

class JsonDb implements FileDatabaseInterface
{
    private const FILE_PATH = __CORE__ . 'dataset/';

    private static array|JsonDb $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \RuntimeException("Cannot unserialize a singleton.");
    }

    public static function getInstance(): FileDatabaseInterface
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function read($fileName): array|false
    {
        $file = self::FILE_PATH . $fileName . '.json';

        if ($this->checkError($file)) {
            return false;
        }

        return json_decode(file_get_contents($file), JSON_PRETTY_PRINT);
    }

    public function checkError($file): bool
    {
        if (file_exists($file)) {
            return false;
        }

        return true;
    }
}