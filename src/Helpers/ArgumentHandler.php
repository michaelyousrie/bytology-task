<?php

namespace Bytology\Helpers;

class ArgumentHandler
{
    public static $num1;
    public static $num2;

    public static function init(array $args)
    {
        $hasErrors = false;

        if (count($args) != 3) {
            Log::error("ERROR: The number of arguments must be exactly 2!");
            Log::br();
            die;
        }

        if (!is_numeric($args[1])) {
            Log::error("ERROR: The first number must be numeric!");
            Log::br();
            $hasErrors = true;
        }

        if (!is_numeric($args[2])) {
            Log::error("ERROR: The second number must be numeric!");
            Log::br();
            $hasErrors = true;
        }

        if ($hasErrors) {
            die;
        }

        self::$num1 = $args[1];
        self::$num2 = $args[2];
    }
}
