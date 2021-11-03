<?php

namespace App\Converters;


abstract class Converter
{
    protected $units = [];

    public function convertible($from, $to)
    {
        return in_array($from, $this->units) && in_array($to, $this->units);
    }
}
