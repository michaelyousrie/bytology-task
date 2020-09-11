<?php

namespace Bytology\Helpers;

class View
{
    public static function make(string $view, array $data = [])
    {
        require_once(__VIEWS__ . "{$view}.view");
    }
}
