<?php

namespace Tests\Converters;

use App\Converters\MassConverter;
use PHPUnit\Framework\TestCase;

class MassConverterTest extends TestCase
{
    /**
     * @return void
     */
    public function test_convertible_kilogram_to_gram()
    {
        $convertible = (new MassConverter())->convertible('kilogram', 'gram');

        $this->assertTrue($convertible);
    }

    /**
     * @return void
     */
    public function test_convertible_gram_to_kilogram()
    {
        $convertible = (new MassConverter())->convertible('gram', 'kilogram');

        $this->assertTrue($convertible);
    }

    /**
     * @return void
     */
    public function test_convertible_with_invalid_from_unit()
    {
        $convertible = (new MassConverter())->convertible('example', 'gram');

        $this->assertFalse($convertible);
    }

    /**
     * @return void
     */
    public function test_convertible_with_invalid_to_unit()
    {
        $convertible = (new MassConverter())->convertible('kilogram', 'example');

        $this->assertFalse($convertible);
    }

    /**
     * @return void
     */
    public function test_convert_kilogram_to_gram()
    {
        $convert = (new MassConverter())->convert(1, 'kilogram', 'gram');

        $this->assertEquals(1000, $convert);
    }

    /**
     * @return void
     */
    public function test_convert_gram_to_kilogram()
    {
        $convert = (new MassConverter())->convert(1, 'gram', 'kilogram');

        $this->assertEquals(0.001, $convert);
    }
}
