<?php

namespace App\Models;

class User extends Model
{
    protected static string $table = "users";
    protected static array $fillable = [
        'name', 'username', 'email', 'address' => [
            'street', 'suite', 'city', 'zipcode', 'geo' => ['lat', 'lng']
        ], 'phone', 'website', 'company' => ['name', 'catchPhrase', 'bs']
    ];

    /**
     * @param string $email
     * @return array|null
     */
    public static function getUserByEmail(string $email): ?array
    {
        $userByEmail = array_filter(self::get(), static function ($item) use ($email) {
            return $item['email'] === $email;
        });

        return empty($userByEmail) ? null : reset($userByEmail);
    }
}