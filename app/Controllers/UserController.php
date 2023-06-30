<?php

namespace App\Controllers;

use App\Services\UserService;
use Helpers\Helper;
use App\Models\User;
use Helpers\Pagination;
use helpers\Request;
use Helpers\Response;

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
        $pagination = Pagination::run($users, 3);

        if (is_null($pagination)){
            return (new Response())->showError(404);
        }

        return [
            'path' => 'user/index',
            'users' => $pagination['result_array'],
            'pageArray' => $pagination['page_array'],
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