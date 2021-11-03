<?php

namespace App\Converters;

trait UnitValues
{
    public function convert($value, $from, $to)
    {
        return $value * $this->unitValues[$to] / $this->unitValues[$from];
    }
}
