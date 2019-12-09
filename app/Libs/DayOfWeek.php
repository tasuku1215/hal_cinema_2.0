<?php

namespace App\Libs;

class DayOfWeek
{
    public function dow($num)
    {
        switch ($num) {
            case 0:
                $dow = "日";
                break;
            case 1:
                $dow = "月";
                break;
            case 2:
                $dow = "火";
                break;
            case 3:
                $dow = "水";
                break;
            case 4:
                $dow = "木";
                break;
            case 5:
                $dow = "金";
                break;
            case 6:
                $dow = "土";
                break;
        }
        return $dow;
    }
}
