<?php

namespace Bytology\Helpers;

class Log
{
    private static $colors = [
        'green'     => '\033[32m',
        'success'   => '\033[32m',

        'yellow'    => '\033[93m',
        'info'      => '\033[93m'
    ];

    public static function br()
    {
        echo "\n";
    }

    public static function print(string $msg)
    {
        echo "{$msg}";
    }

    public static function info(string $msg)
    {
        self::print("\033[93m {$msg}");
    }

    public static function error(string $msg)
    {
        self::print("\033[31m {$msg}");
    }

    public static function success(string $msg)
    {
        self::print("\033[32m {$msg}");
    }

    public static function header(string $headerText = "OUTPUT START")
    {
        self::error("====== {$headerText} ======");
        self::br();
    }

    public static function footer()
    {
        self::error("------------");
        self::br();
    }

    public static function color(string $key)
    {
        echo self::$colors[$key];
    }

    public static function table(array $headers, array $data)
    {
        $mask = "|%14s | %14s | %14s | %14s | %14s | %14s | %14s\n";
        printf("{$mask}", ...$headers);
        printf("{$mask}", '------', '------', '------', '------', '------', '------', '------');

        foreach ($data as $row) {
            printf($mask, ...array_values($row));
        }
    }
}
