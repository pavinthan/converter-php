<?php

namespace Tests\Converters;

use App\Converters\DistanceConverter;
use PHPUnit\Framework\TestCase;

class DistanceConverterTest extends TestCase
{
    /**
     * @return void
     */
    public function test_convertible_kilometer_to_meter()
    {
        $convertible = (new DistanceConverter())->convertible('kilometer', 'meter');

        $this->assertTrue($convertible);
    }

    /**
     * @return void
     */
    public function test_convertible_meter_to_kilometer()
    {
        $convertible = (new DistanceConverter())->convertible('meter', 'kilometer');

        $this->assertTrue($convertible);
    }

    /**
     * @return void
     */
    public function test_convertible_with_invalid_from_unit()
    {
        $convertible = (new DistanceConverter())->convertible('example', 'meter');

        $this->assertFalse($convertible);
    }

    /**
     * @return void
     */
    public function test_convertible_with_invalid_to_unit()
    {
        $convertible = (new DistanceConverter())->convertible('kilometer', 'example');

        $this->assertFalse($convertible);
    }

    /**
     * @return void
     */
    public function test_convert_kilometer_to_meter()
    {
        $convert = (new DistanceConverter())->convert(1, 'kilometer', 'meter');

        $this->assertEquals(1000, $convert);
    }

    /**
     * @return void
     */
    public function test_convert_meter_to_kilometer()
    {
        $convert = (new DistanceConverter())->convert(1, 'meter', 'kilometer');

        $this->assertEquals(0.001, $convert);
    }
}
