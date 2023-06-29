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
}