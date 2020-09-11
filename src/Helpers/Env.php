<?php

namespace Bytology\Helpers;

class Env
{
    private static $envData = [];

    public static function init()
    {
        $envData = explode("\n", file_get_contents(__ENV__));

        foreach ($envData as $line) {
            if (empty($line)) {
                continue;
            }

            $explodedLine = explode('=', $line);
            self::$envData[$explodedLine[0]] = trim(str_replace(['"', "'"], ['', ''], $explodedLine[1]));
        }

        return true;
    }

    public static function get(string $key, $default = null)
    {
        return isset(self::$envData[$key]) ? self::$envData[$key] : $default;
    }

    public static function set(string $key, $value)
    {
        self::$envData[$key] = $value;

        return true;
    }
}
