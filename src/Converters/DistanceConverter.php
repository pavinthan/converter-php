<?php

namespace App\Converters;

use App\Contracts\Converter as ConverterContract;

class DistanceConverter extends Converter implements ConverterContract
{
    use UnitValues;

    protected $units = [
        'kilometer', 'meter'
    ];

    protected $unitValues = [
        'kilometer' => 1,
        'meter' => 1000
    ];
}
