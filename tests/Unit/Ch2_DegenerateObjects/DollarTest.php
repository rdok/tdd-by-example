<?php

namespace Tests\Unit\Ch2_DegenerateObjects;

use Tests\Unit\UnitTestCase;
use App\Ch2_DegenerateObjects\Dollar;

class DollarTest extends UnitTestCase {

    /** @test */
    public function it_may_multiple_a_dollar() {
        $five = new Dollar(5);
        
        $product = $five->times(2);
        $this->assertSame(10, $product->amount);

        $product = $five->times(3);
        $this->assertSame(15, $product->amount);
    }
}
