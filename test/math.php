<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Jumichica\Pjson\Math;

$omath = new Math();
$json = '[
{"A": 1,"B": 2, "C": "= A + B"},
{"A": 1, "B": 2, "C": "= A - B"},
{"A": 1, "B": 2,"C": "= A * B"},
{"A": 1,"B": 2,"C": "= A / B"}
]';
$pjson = $omath->arithmetic($json);
$pjson = json_decode($pjson);
print_r($pjson[0]->C->value);
