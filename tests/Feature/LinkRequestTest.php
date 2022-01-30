<?php

namespace Tests\Feature;

use App\Http\Livewire\Shorten\LinkForm;
use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LinkRequestTest extends TestCase
{
    /** @test */
    public function user_is_redirected_to_original_url_on_request()
    {
        $link = Link::factory()->create();

        $this->get('/' . $link->code)
            ->assertRedirect($link->original_url);
    }

    /** @test */
    public function if_code_doesnt_exist_throw_404_exception()
    {
        $this->get('/non-existing-code')
            ->assertStatus(404);
    }

    /** @test */
    public function used_count_is_incremented_on_request()
    {
        $link = Link::factory()->create();

        $this->get('/' . $link->code);
        $this->get('/' . $link->code);
        $this->get('/' . $link->code);

        $this->assertEquals(Link::find($link->id)->used_count, 3);
    }
}
