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

        return strpos($url, 'http') !== 0 ? "http://$url" : $url;
    }
}
