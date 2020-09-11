<?php

namespace Bytology\Bootstrap;

use Bytology\Helpers\Env;
use Bytology\Database\Database;

class Bootstrap
{
    public static function init()
    {
        define("__ROOT__", __DIR__ . "/../../");
        define("__ENV__", __ROOT__ . ".env");
        define("__VIEWS__", __ROOT__ . "views/");

        Env::init();
        Container::set('db', new Database());
    }
}
