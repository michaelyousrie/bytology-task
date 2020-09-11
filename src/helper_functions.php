<?php

use Bytology\Helpers\Env;
use Bytology\Bootstrap\Container;
use Bytology\Helpers\Log;

function env()
{
    return Env::get('env');
}

function db()
{
    return Container::get('db');
}

function dd(...$vars)
{
    foreach ($vars as $var) {
        print_r($var);
    }

    die;
}

function success(string $msg)
{
    return Log::success($msg);
}

function info(string $msg)
{
    return Log::info($msg);
}

function error(string $msg)
{
    return Log::error($msg);
}

function br()
{
    return Log::br();
}
