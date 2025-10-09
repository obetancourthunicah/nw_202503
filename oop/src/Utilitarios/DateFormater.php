<?php

namespace Unicah\Oop\Utilitarios;

use Datetime;

class DateFormater
{
    private function __construct()
    {
        // Do Nothing
    }
    public static function toISOStringDate(DateTime $date): string
    {
        // 20251008
        $ISOstring = $date->format('Ymd');
        return $ISOstring;
    }
}
