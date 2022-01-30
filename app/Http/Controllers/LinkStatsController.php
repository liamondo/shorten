<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkStatsController extends Controller
{
    public function __invoke(Link $link)
    {
        return view('stats', [
            'link' => $link,
        ]);
    }
}
