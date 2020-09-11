<?php
require_once("vendor/autoload.php");

use Bytology\Helpers\View;
use Bytology\Bootstrap\Bootstrap;

Bootstrap::init();

$results = db()->fetch('results');

View::make('document', $results);
