<?php

namespace App\Controllers;

use App\Services\UserService;
use Helpers\Helper;
use App\Models\User;
use Helpers\Pagination;
use Helpers\Request;
use Helpers\Response;
use Helpers\Validations\Validator;

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

        if (is_null($users)) {
            return [
                'path' => 'user/index',
                'users' => $users,
                'links' => $navigationLinks
            ];
        }

        $users = UserService::transformUsers($users);
        $pagination = Pagination::run($users, 3);

        if (is_null($pagination)) {
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

    /**
     * @param array $user
     * @param array $errors
     * @return array
     */
    public function create(array $user = [], array $errors = []): array
    {
        $navigationLinks = Helper::getNavigationLinks();

        return [
            'path' => 'user/new',
            'user' => $user,
            'errors' => $errors,
            'links' => $navigationLinks
        ];
    }

    /**
     * @param Request $request
     * @return array|void
     */
    public function store(Request $request): array|true
    {
        $fields = $request->get('post');
        $errors = (new Validator())->userValidate($fields);

        if ($errors) {
            return $this->create($fields, $errors);
        }

        User::create($fields);
        (new Response())->redirect('/users');

        return true;
    }
}