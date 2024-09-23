<?php
namespace YGZLib;

class PidGenerator
{
    public static function generate($code = "DEF")
    {
        $prefix = $code;
        $currentDateTime = new \DateTime();
        $formattedDate = $currentDateTime->format('Ymd');
        $microtimeParts = explode(' ', microtime());
        $milliseconds = ((int)$microtimeParts[1]) * 1000 + ((int)round($microtimeParts[0] * 1000));
        $milliseconds = substr($milliseconds, -3);
        $pid = $prefix . $formattedDate . $milliseconds . rand(1, 999);
        return $pid;
    }

    public static function idTime($prefix = 2,$timestamp = null) 
    {
        if ($timestamp === null) {
            $timestamp = time();
        }

        if ($prefix) {
                
            $microtime = microtime(true);

            // Split the float into seconds and microseconds
            $microtimeParts = explode('.', $microtime);
            $microseconds = isset($microtimeParts[1]) ? $microtimeParts[1] : '000000';  // Handle missing microseconds


            // Extract the first 2 digits of the microseconds
            if ($prefix === true) {
                $prefix = 2;
            }
            $first_two_digits = substr($microseconds, 0, $prefix);

            $timestamp = $timestamp.$first_two_digits;
        }


        // Convert timestamp to base 36
        $shortId = base_convert($timestamp, 10, 36);
        $shortId = strtoupper($shortId);

        // Concatenate unique prefix with the shortened ID
        // $id = $uniquePrefix . $shortId;
        $id =  $shortId;

        return $id;
    }

}