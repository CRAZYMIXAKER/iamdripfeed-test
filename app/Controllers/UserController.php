<?php

namespace App\Controllers;

use App\Services\UserService;
use Helpers\Helper;
use App\Models\User;
use helpers\Request;

class UserController
{
    /**
     * @return array
     */
    public function index(): array
    {
        $navigationLinks = Helper::getNavigationLinks();
        $users = User::get(['id', 'name', 'username', 'email', 'address' => [
            'street', 'zipcode', 'city', 'geo' => ['lat']
        ], 'phone', 'company' => ['name']
        ]);

        $users = UserService::transformUsers($users);

        return [
            'path' => 'user/index',
            'users' => $users,
            'links' => $navigationLinks
        ];
    }

    /**
     * @param Request $request
     * @return int|false
     */
    public function destroy(Request $request): int|false
    {
        return User::delete($request->get('json')->id);
    }
}