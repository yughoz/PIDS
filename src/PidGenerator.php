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

    public static function idTime($timestamp = null) 
    {
        // Use current time if no timestamp is provided
        if ($timestamp === null) {
            $timestamp = time();
        }

        // Generate a unique prefix, such as a unique ID
        $number = rand(0,5);
        $base36 = base_convert($number, 10, 36);
        $uniquePrefix = strtoupper($base36);

        // Convert timestamp to base 36
        $shortId = base_convert($timestamp, 10, 36);
        $shortId = strtoupper($shortId);

        // Concatenate unique prefix with the shortened ID
        $id = $uniquePrefix . $shortId;

        return $id;
    }
}