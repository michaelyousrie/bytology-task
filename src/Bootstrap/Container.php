<?php

namespace Bytology\Bootstrap;

class Container
{
    private static $data = [];

    public static function set(string $key, $value)
    {
        self::$data[$key] = $value;
    }

    public static function get(string $key, $default = null)
    {
        return isset(self::$data[$key]) ? self::$data[$key] : $default;
    }
}
