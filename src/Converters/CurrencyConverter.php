<?php

namespace App\Converters;

use App\Contracts\Converter as ConverterContract;

class CurrencyConverter extends Converter implements ConverterContract
{
    protected $units = [
        'usd', 'thb'
    ];

    public function convert($value, $from, $to)
    {
        // TODO: Call the API service with provided credentials 
    }
}
