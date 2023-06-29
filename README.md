# pjson
Methods to transform json files, maths, filters and more

# INSTALL 
    composer require jumichica/pjson

# Examples
# Arithmetic Procesing
If you define a atribute with an initial equal (=) the system analyze te content to eval the formula.

    $omath = new Math();
    $json = '[
    {"A": 1,"B": 2, "C": "= A + B"},
    {"A": 1, "B": 2, "C": "= A - B"},
    {"A": 1, "B": 2,"C": "= A * B"},
    {"A": 1,"B": 2,"C": "= A / B"}
    ]';
    $pjson = $omath->arithmetic($json);
    print_r($pjson);

