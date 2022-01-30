<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;

class Prepend
{
    public static function prependToUrlIfMissing($url)
    {
        if(!filled($url)) {
            return null;
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return 'http://' . $url;
        }

        return $url;
    }
}
