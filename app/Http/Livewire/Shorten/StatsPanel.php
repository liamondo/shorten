<?php

namespace App\Http\Livewire\Shorten;

use App\Models\Link;
use Livewire\Component;

class StatsPanel extends Component
{
    public Link $link;

    public function render()
    {
        return view('shorten.stats-panel');
    }
}
