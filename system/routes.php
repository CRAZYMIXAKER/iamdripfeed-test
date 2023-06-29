<?php
return [
    [
        'route' => '/^\/?$/',
        'method' => 'index',
        'controller' => 'App',
        'request_method' => 'GET'
    ],
    [
        'route' => '/^\/users?$/',
        'method' => 'index',
        'controller' => 'User',
        'request_method' => 'GET'
    ],
    [
        'route' => '/^\/users\/\d+?$/',
        'method' => 'destroy',
        'controller' => 'User',
        'request_method' => 'DELETE'
    ],
];