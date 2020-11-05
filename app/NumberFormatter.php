<?php

namespace App;

class NumberFormatter
{
    public static function floatValueFormatter(float $value): string
    {
        return number_format($value, 2);
    }

    public static function bidSizeFormatter(int $bidSize): string
    {
        return $bidSize * 100;
    }

    public static function askSizeFormatter(int $ask): string
    {
        return $ask * 100;
    }

    public static function volumeFormatter(int $volume): string
    {
        return number_format($volume, 0, '.', ',');
    }
}