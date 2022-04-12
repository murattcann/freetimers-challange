<?php
namespace App\Enums;
class Units
{
    //measurement units
    const METERS = "meters";
    const FEETS = "feets";
    const YARDS = "yards";

    //depth measurement unit
    const CANTIMETERS = "cantimeters";
    const INCHES = "inches";


    /**
     * This array set used to convert units excluding meters
     * @var array UNIT_MULTIPLES
     */
    const UNIT_MULTIPLES = [
        self::METERS => 1,
        self::YARDS => 0.9144,
        self::FEETS => 0.3048,
        self::INCHES => 0.0254,
        self::CANTIMETERS => 0.01
    ];
}