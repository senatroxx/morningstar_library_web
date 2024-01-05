<?php

namespace App\Helpers;

use Carbon\Carbon;

class CountWeeks
{
    public static function count($start_date, $finish_date)
    {
        $start_date = Carbon::parse($start_date);
        $finish_date = Carbon::parse($finish_date);

        return ceil($start_date->diff($finish_date)->days/7);
    }
}