<?php

namespace Tests\Unit;

use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;

class PrependTest extends TestCase
{
    /** @test */
    public function correctly_prepends_http_to_link_with_missing_scheme()
    {
        $url = 'google.com';

        $prepend = new \App\Helpers\Prepend;
        $url = $prepend->prependToUrlIfMissing($url);

        $this->assertEquals('http://google.com', $url);
    }

    /** @test */
    public function http_is_not_prepended_to_link_if_any_scheme_is_present()
    {
        $urls = [
            'http://google.com',
            'https://google.com',
        ];

        foreach ($urls as $rawUrl) {
            $prepend = new \App\Helpers\Prepend;
            $url = $prepend->prependToUrlIfMissing($rawUrl);

            $this->assertEquals($rawUrl, $url);
        }
    }
}
