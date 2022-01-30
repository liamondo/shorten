<?php

namespace App\Http\Livewire\Shorten;

use App\Models\Link;
use Livewire\Component;

class LinkForm extends Component
{
    public $link;

    public $requestedLink;

    protected $rules = [
        'link' => ['required', 'url'],
    ];

    protected $messages = [
        'link.required' => 'You must specify a link.'
    ];

    public function submit()
    {
        $prepend = new \App\Helpers\Prepend;
        $this->link = $prepend->prependToUrlIfMissing($this->link);

        $this->validate();

        $link = Link::firstOrCreate([
            'original_url' => $this->link,
        ]);

        $link->increment('requested_count');

        $this->requestedLink = $link->shortenedUrl();
        $this->link = null;
    }

    public function render()
    {
        return view('shorten.link-form');
    }
}
