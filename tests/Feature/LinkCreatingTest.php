<?php

namespace Tests\Feature;

use App\Http\Livewire\Shorten\LinkForm;
use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class LinkCreatingTest extends TestCase
{
    /** @test */
    public function link_is_required()
    {
        //If no link must return link required error
        Livewire::test(LinkForm::class)
            ->set('link', '')
            ->call('submit')
            ->assertHasErrors(['link' => 'required']);

        //If no link must also not create database record
        $this->assertFalse(Link::whereCode('1')->exists());
    }

    /** @test */
    public function link_must_be_valid_url()
    {
        //If link is invalid must return link valid error
        Livewire::test(LinkForm::class)
            ->set('link', 'not a url')
            ->call('submit')
            ->assertHasErrors(['link' => 'url']);

        //If invalid link must also not create database record
        $this->assertFalse(Link::whereCode('1')->exists());
    }

    /** @test */
    public function duplicate_link_can_only_be_shortened_once()
    {
        $link = 'https://google.com';

        //Submit test link
        Livewire::test(LinkForm::class)
            ->set('link', $link)
            ->call('submit');

        //Submit same test link second time
        Livewire::test(LinkForm::class)
            ->set('link', $link)
            ->call('submit');

        //Check link only exists once in database
        $this->assertEquals(Link::whereOriginalUrl($link)->get()->count(), 1);
    }

    /** @test */
    public function link_can_be_shortened()
    {
        Livewire::test(LinkForm::class)
            ->set('link', 'https://google.com')
            ->call('submit');

        $this->assertTrue(Link::whereCode('1')->exists());
    }

    /** @test */
    public function link_requested_count_is_incremented()
    {
        $link = 'https://google.com';

        //Submit test link
        Livewire::test(LinkForm::class)
            ->set('link', $link)
            ->call('submit');

        //Submit same test link second time
        Livewire::test(LinkForm::class)
            ->set('link', $link)
            ->call('submit');

        //Requested link should now have requested count of 2
        $this->assertEquals(Link::whereOriginalUrl($link)->first()->requested_count, 2);
    }

    /** @test */
    public function short_link_is_returned_to_user_on_submit()
    {
        //Submit test link and see short link on page
        Livewire::test(LinkForm::class)
            ->set('link', 'https://google.com')
            ->call('submit')
            ->assertSee(env('APP_URL') . '1');
    }
}
