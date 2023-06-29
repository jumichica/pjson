<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/autoload.php';

use jumichica\psjon\math\Math;

$omath = new Math();
$json = '[
    {"A": 1,"B": 2, "C": "= A + B"},
    {"A": 1, "B": 2, "C": "= A - B"},
    {"A": 1, "B": 2,"C": "= A * B"},
    {"A": 1,"B": 2,"C": "= A / B"}
    ]';
$pjson = $omath->arithmetic($json);
print_r($pjson);