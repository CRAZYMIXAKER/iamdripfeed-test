<?php

namespace Helpers;

class Response
{
    /**
     * @param int $codeError
     * @return array
     */
    public function showError(int $codeError): array
    {
        http_response_code($codeError);
        $navigationLinks = Helper::getNavigationLinks();

        return [
            'path' => 'error',
            'codeError' => $codeError,
            'links' => $navigationLinks
        ];
    }

    /**
     * @param $route
     * @return void
     */
    public function redirect($route): void
    {
        header("Location: $route");
        return;
    }
}