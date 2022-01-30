<?php

namespace Tests\Unit;

use App\Models\Link;
use Tests\TestCase;

class LinkModelTest extends TestCase
{
    //Base62 mappings
    protected $mappings = [
        1 => 1,
        2 => 2,
        100 => '1C',
        1000000 => '4c92',
        123456789 => '8m0Kx',
    ];

    /** @test */
    public function correct_link_code_is_generated()
    {
        $link = new Link;

        foreach ($this->mappings as $id => $expectedCode) {
            $link->id = $id;
            $this->assertEquals($link->getCode(), $expectedCode);
        }
    }

    /** @test */
    public function exception_is_thrown_if_no_id()
    {
        $this->expectException(\App\Exceptions\CodeGenerationException::class);

        $link = new Link;
        $link->getCode();
    }

    /** @test */
    public function can_get_link_model_by_code()
    {
        $link = Link::factory()->create([
            'code' => 'abc'
        ]);

        $model = $link->byCode($link->code)->first();

        $this->assertInstanceOf(Link::class, $model);
        $this->assertEquals($model->original_url, $link->original_url);
    }

    /** @test */
    public function can_get_short_url_from_link_model()
    {
        $link = Link::factory()->create();

        $this->assertEquals($link->shortenedUrl(), env("APP_URL") . $link->code);
    }

    /** @test */
    public function null_is_returned_as_short_url_when_no_code_is_present()
    {
        //Testing existing link. Flush listeners to prevent code being added on link creation.
        Link::flushEventListeners();

        $link = Link::factory()->create();

        $this->assertNull($link->shortenedUrl());
    }
}
