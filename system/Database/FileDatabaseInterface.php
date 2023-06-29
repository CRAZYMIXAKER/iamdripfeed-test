<?php

namespace System\Database;

interface FileDatabaseInterface
{
    /**
     * @return FileDatabaseInterface
     */
    public static function getInstance(): FileDatabaseInterface;

    /**
     * Read database file
     *
     * @param $fileName
     * @return array|false
     */
    public function read($fileName): array|false;

    /**
     * @param $file
     * @return bool
     */
    public function checkError($file): bool;
}