<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */

    public function test_example_unit()
    {
        $this->assertTrue(true);
        
    }
    public function test_math()
    {
        $sum = 5 + 5;

        $this->assertEquals(10, $sum);
    }
}
