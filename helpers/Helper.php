<?php

namespace Helpers;

class Helper
{
    /**
     * Get links for the navigation bar template
     *
     * @return array
     */
    public static function getNavigationLinks(): array
    {
        return [
            'uri' => $_SERVER['REQUEST_URI']
        ];
    }
}