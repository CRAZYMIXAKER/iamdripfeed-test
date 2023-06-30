<?php

namespace System\Database;

class JsonDb implements FileDatabaseInterface
{
    private const FILE_PATH = __CORE__ . 'dataset/';

    /**
     * @var array|JsonDb
     */
    private static array|JsonDb $instances = [];

    protected function __construct()
    {
    }

    /**
     * @return void
     */
    protected function __clone()
    {
    }

    /**
     * @return mixed
     */
    public function __wakeup()
    {
        throw new \RuntimeException("Cannot unserialize a singleton.");
    }

    /**
     * @return FileDatabaseInterface
     */
    public static function getInstance(): FileDatabaseInterface
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    /**
     * @param string $fileName
     * @return array|false
     */
    public function read(string $fileName): array|false
    {
        $file = self::FILE_PATH . $fileName . '.json';

        if ($this->checkError($file)) {
            return false;
        }

        return json_decode(file_get_contents($file), JSON_PRETTY_PRINT);
    }

    /**
     * @param array $data
     * @param string $fileName
     * @return int|false
     */
    public function update(array $data, string $fileName): int|false
    {
        $file = self::FILE_PATH . $fileName . '.json';

        if ($this->checkError($file)) {
            return false;
        }

        return file_put_contents($file, json_encode($data, true));
    }

    /**
     * @param string $file
     * @return bool
     */
    public function checkError(string $file): bool
    {
        if (file_exists($file)) {
            return false;
        }

        return true;
    }
}