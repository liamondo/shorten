<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
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
    public function correctly_encodes_provided_values()
    {
        $math = new \App\Helpers\Math;

        foreach($this->mappings as $value => $encoded) {
            $this->assertEquals($encoded, $math->toBase($value));
        }
    }
}
