<?php

namespace App\Contracts;

interface Converter
{
    public function convertible($from, $to);

    public function convert($value, $from, $to);
}
