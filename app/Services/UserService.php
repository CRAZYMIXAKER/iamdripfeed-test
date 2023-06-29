<?php

namespace App\Services;

class UserService
{
    public static function transformUsers($users): array
    {
        return array_map(static function ($user) {
            $user['address'] = "{$user['address']['street']}, {$user['address']['zipcode']} {$user['address']['city']}";
            $user['company'] = $user['company']['name'];
            return $user;
        }, $users);
    }
}