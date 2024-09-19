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
}