<?php

namespace App\Classes;

class Helpers
{

    /**
     * By Johnson
     * Function takes a date string and returns a formatted date object
     * @param string $dateString
     * @return String
     */
    public static function makeDate(String $dateString): string
    {
        $date = explode("-",$dateString);
        if(count($date) != 3) $date = explode("/",$dateString);
        $day = $date[0];
        $month = strlen($date[1]) == 1 ? "0". $date[1] : $date[1];
        $year = strlen($date[2]) == 2 ? "20". $date[2] : $date[2];
        $date = $year . "-" . $month . "-" . $day;
        $ymd = date('Y-m-d', strtotime($date));
        return $ymd;
    }

    /**
     * By Johnson
     * Function takes a number string and returns a formatted number String
     * Strips chars like ','
     * @param string $number
     * @return int|string
     */
    public static function sanitizeNumber(String $number){
        $b = str_replace( ',', '', $number );
        if( is_numeric( $b ) ) {
            return $b;
        }
        else{
            return $number;
        }
    }

}
