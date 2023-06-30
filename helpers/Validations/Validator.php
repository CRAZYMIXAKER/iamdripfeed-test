<?php

namespace Helpers\Validations;

use App\Models\User;

class Validator
{
    protected static string $emailPattern = '/^[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/';
    protected static string $phonePattern = '/\A(\+\d{1,2}\s?)?(\(\d{3}\)|\d{3})[-.\s]?\d{3}[-.\s]?\d{4}(\sx\d+)?\z/i';
    protected static string $lettersDashSpacePattern = '/^[a-zA-Z\- ]+$/';

    public function userValidate(array &$fields): array
    {
        $errors = [];

        foreach ($fields as $key => $item) {
            if (empty($item)) {
                $errors[$key] = "Fill in the field $key";
            }
        }

        // name
        if (!preg_match('/^[A-Za-z ]+$/', $fields['name'])) {
            $errors['name'] = 'Name can only contain letters and spaces';
        }

        if (strlen($fields['name']) < 5 || strlen($fields['name']) > 56) {
            $errors['name'] = 'Name must be at least 5 characters long and no more then 56';
        }

        // username
        if (!preg_match('/^[A-Za-z\-._\s]+$/', $fields['username'])) {
            $errors['username'] = "Username can only contain letters, spaces, '-', '.', '_'";
        }

        if (strlen($fields['username']) < 5 || strlen($fields['username']) > 56) {
            $errors['username'] = 'Username must be at least 5 characters long and no more then 56';
        }

        // email
        if (User::getUserByEmail($fields['email']) !== null) {
            $errors['email'] = 'This E-mail is already taken, please enter another';
        }

        if (!preg_match(self::$emailPattern, $fields['email'])) {
            $errors['email'] = 'Enter E-mail by template';
        }

        if (strlen($fields['email']) < 10 || strlen($fields['email']) > 32) {
            $errors['email'] = 'Email must be at least 10 characters long and no more then 32';
        }

        // address - street
        if (!preg_match(self::$lettersDashSpacePattern, $fields['address']['street'])) {
            $errors['address']['street'] = 'Street can only contain letters, spaces and dashes';
        }

        if (strlen($fields['address']['street']) < 5 || strlen($fields['address']['street']) > 32) {
            $errors['address']['street'] = 'Street must be at least 5 characters long and no more then 32';
        }

        // address - city
        if (!preg_match(self::$lettersDashSpacePattern, $fields['address']['city'])) {
            $errors['address']['city'] = 'City can only contain letters, spaces and dashes';
        }

        if (strlen($fields['address']['city']) < 5 || strlen($fields['address']['city']) > 32) {
            $errors['address']['city'] = 'City must be at least 5 characters long and no more then 32';
        }

        // address - zipcode
        if (!preg_match('/^\d{5}(?:[-\s]\d{4})?$/', $fields['address']['zipcode'])) {
            $errors['address']['zipcode'] = 'Zipcode can only contain numbers and dashes';
        }

        if (strlen($fields['address']['zipcode']) < 5 || strlen($fields['address']['zipcode']) > 16) {
            $errors['address']['zipcode'] = 'Zipcode must be at least 5 characters long and no more then 16';
        }

        // phone
        if (!preg_match(self::$phonePattern, $fields['phone'])) {
            $errors['phone'] = 'Phone can only contain numbers, dashes, dots, spaces, "x", brackets, and plus';
        }

        if (strlen($fields['phone']) < 5 || strlen($fields['phone']) > 32) {
            $errors['phone'] = 'Phone must be at least 5 characters long and no more then 32';
        }

        // company - name
        if (!preg_match(self::$lettersDashSpacePattern, $fields['company']['name'])) {
            $errors['company']['name'] = 'Company name can only contain letters, spaces and dashes';
        }

        if (strlen($fields['company']['name']) < 5 || strlen($fields['company']['name']) > 64) {
            $errors['company']['name'] = 'Company must be at least 5 characters long and no more then 64';
        }

        foreach ($fields as $key => $item) {
            if (is_array($item)) {
                self::useHtmlspecialcharsForArray($item);
            } else {
                $fields[$key] = htmlspecialchars($item);
            }
        }

        return $errors;
    }

    public static function useHtmlspecialcharsForArray(array &$fields): void
    {
        foreach ($fields as $key => $item) {
            $fields[$key] = htmlspecialchars($item);
        }
    }
}