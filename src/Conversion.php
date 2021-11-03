<?php

namespace App;

use App\Contracts\Converter;
use App\Converters\CurrencyConverter;
use App\Converters\DistanceConverter;
use App\Converters\MassConverter;
use App\Exceptions\InvalidUnitException;

class Conversion
{
    protected $availableConverters = [
        MassConverter::class,
        DistanceConverter::class,
        // CurrencyConverter::class,
    ];

    protected function resolveConverterFromInput($from, $to)
    {
        foreach ($this->availableConverters as $availableConverter) {
            $converter = new $availableConverter();

            if (!($converter instanceof Converter)) {
                continue;
            }

            if ($converter->convertible($from, $to)) {
                return $converter;
            }
        }
    }

    public function convert($value, $from, $to)
    {
        $from = strtolower($from);
        $to = strtolower($to);

        $converter = $this->resolveConverterFromInput($from, $to);
        if (!$converter) {
            throw new InvalidUnitException();
        }

        return $converter->convert($value, $from, $to);
    }
}
