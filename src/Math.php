<?php
/***
 * Math operations over json.
 * @author Edwin Ariza <me@edwinariza.com>
 * @copyright Jumichica
 * @license MIT
 */

namespace Jumichica\Pjson;

class Math{
    /**
     * @param string $json to transform a original Json with operation in to Json with results of formulas.
     * @return String
     */
    public function arithmetic(string $json): string
    {
        $pjson="";
        // ENCODE JSON STRING
        $json = json_decode($json);
        // PROCESS THE JSON
        foreach ($json as $row) {
            foreach ($row as $key => $value){
                $first_character = substr($value, 0, 1);
                $iresult = 0;
                if($first_character=='='){
                    $bformula = $value;
                    $formula = str_replace("=", "", $value);
                    $formula = str_replace(" ","", $formula);
                    foreach ($row as $ikey => $ivalue){
                        $formula = str_replace(strtoupper($ikey), $ivalue, $formula);
                    }

                    $formula = '$iresult = '.$formula.';';
                    // EVAL THE FORMULE
                    eval($formula);
                    $row->$key = "{'formula': '$bformula', 'value':'$iresult'}";
                }
                else{
                    $iresult = $value;
                    $row->$key = $iresult;
                }
            }
        }
        return json_encode($json);
    }
}
