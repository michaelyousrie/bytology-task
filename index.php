<?php
require_once("vendor/autoload.php");

use Bytology\Bootstrap\Bootstrap;
use Bytology\Helpers\View;

Bootstrap::init();

$results = db()->fetch('results');

View::make('document', $results);
