<?php

namespace App\Models;

use App\Models\Model;
use Helpers\Helper;

class User extends Model
{
    protected static string $table = "users";
    protected static array $fillable = ['name', 'username', 'email', 'address' => [
        'street', 'suite', 'city', 'zipcode', 'geo' => ['lat', 'lng']
    ], 'phone', 'website', 'company' => ['name', 'catchPhrase', 'bs']];

    /**
     * @param string $effective_date
     * @param array $fields
     * @return array|null
     */
    public static function getByEmail(string $effective_date, array $fields = ['*']): ?array
    {
//        $query = sprintf(
//            'SELECT %s FROM %s where effective_date = :effective_date',
//            Helper::getSeparatedArrayByComma($fields),
//            static::$table
//        );
//        $currencies = static::$db->query($query, ['effective_date' => $effective_date])->fetchAll();
//
//        return $currencies === false ? null : $currencies;
        return null;
    }
}