<?php

namespace App\Controllers;

use App\Services\UserService;
use Helpers\Helper;
use App\Models\User;

class UserController
{
    /**
     * @return array
     */
    public function index(): array
    {
        $navigationLinks = Helper::getNavigationLinks();
        $users = User::get(['name', 'username', 'email', 'address' => [
            'street', 'zipcode', 'city', 'geo' => ['lat']
        ], 'phone', 'company' => ['name']
        ]);

        $users = UserService::transformUsers($users);

//        echo '<pre>';
//        var_dump($a);
//        echo '</pre>';

        return [
            'path' => 'user/index',
            'users' => $users,
            'links' => $navigationLinks
        ];
    }
}