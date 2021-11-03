<?php

namespace App\Converters;

use App\Contracts\Converter as ConverterContract;

class MassConverter extends Converter implements ConverterContract
{
    use UnitValues;

    protected $units = [
        'kilogram', 'gram'
    ];

    protected $unitValues = [
        'kilogram' => 1,
        'gram' => 1000
    ];
}
