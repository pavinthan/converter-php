<?php

namespace Tests;

use App\Conversion;
use App\Exceptions\InvalidUnitException;
use PHPUnit\Framework\TestCase;

class ConversionTest extends TestCase
{
    /**
     * @return void
     */
    public function test_convert_distance_output()
    {
        $convert = (new Conversion())->convert(1, 'kilometer', 'meter');

        $this->assertEquals(1000, $convert);
    }

    /**
     * @return void
     */
    public function test_convert_mass_output()
    {
        $convert = (new Conversion())->convert(1, 'kilogram', 'gram');

        $this->assertEquals(1000, $convert);
    }

    /**
     * @return void
     */
    public function test_convert_invalid_unit_exception()
    {
        $this->expectException(InvalidUnitException::class);

        (new Conversion())->convert(1, 'x', 'y');
    }
}
