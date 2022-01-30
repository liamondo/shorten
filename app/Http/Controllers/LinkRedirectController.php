<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkRedirectController extends Controller
{
    public function __invoke(Link $link)
    {
        $link->increment('used_count');

        return redirect($link->original_url);
    }
}
