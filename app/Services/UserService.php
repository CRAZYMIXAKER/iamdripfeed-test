<?php

namespace App\Services;

class UserService
{
    /**
     * @param array $users
     * @return array
     */
    public static function transformUsers(array $users): array
    {
        return array_map(static function ($user) {
            $user['address'] = "{$user['address']['street']}, {$user['address']['zipcode']} {$user['address']['city']}";
            $user['company'] = $user['company']['name'];
            
            return $user;
        }, $users);
    }
}