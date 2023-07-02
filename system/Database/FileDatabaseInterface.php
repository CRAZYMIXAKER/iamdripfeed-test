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
     * @param string $fileName
     * @return array|false|null
     */
    public function read(string $fileName): array|false|null;

    /**
     * Update(rewrite) database file
     *
     * @param array $data
     * @param string $fileName
     * @return int|false
     */
    public function update(array $data, string $fileName): int|false;

    /**
     * @param string $file
     * @return bool
     */
    public function checkError(string $file): bool;
}