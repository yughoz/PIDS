<?php
namespace YGZLib;

class YGZLib
{
    public static function generate($code = "DEF")
    {
        $prefix = $code;
        $currentDateTime = now();
        $formattedDate = $currentDateTime->format('Ymd');
        $microtimeParts = explode(' ', microtime());
        $milliseconds = ((int)$microtimeParts[1]) * 1000 + ((int)round($microtimeParts[0] * 1000));
        $milliseconds = substr($milliseconds, -3);
        $pid = $prefix . $formattedDate . $milliseconds . rand(1, 999);
        return $pid;
    }
}