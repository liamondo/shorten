<?php

namespace Tests\Feature;

use App\Http\Livewire\Shorten\LinkForm;
use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LinkStatsTest extends TestCase
{
    /** @test */
    public function link_stats_can_be_shown_via_code_link()
    {
        $link = Link::factory()->create([
            'requested_count' => 10,
            'used_count' => 345,
        ]);

        $this->get('/' . $link->code . '/stats')
            ->assertSee($link->shortenedUrl())
            ->assertSee($link->original_url)
            ->assertSee('10')
            ->assertSee('345');
    }
}
