<?php

namespace App\Observers;

use App\Models\Link;

class LinkObserver
{
    public function created(Link $link)
    {
        $link->update([
            'code' => $link->getCode(),
        ]);
    }
}
