<?php
use App\Franc;

/**
 * @author Rizart Dokollari <r.dokollari@linkwi.se>
 * @since 8/23/16
 */
class FrancTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function multiplication()
    {
        $five = new Franc(5);

        $this->assertTrue((new Franc(10))->equals($five->times(2)));

        $this->assertTrue((new Franc(15))->equals($five->times(3)));
    }
}