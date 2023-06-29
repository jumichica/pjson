<?php
/***
 * Math operations over json.
 * @author Edwin Ariza <me@edwinariza.com>
 * @copyright Jumichica
 * @license MIT
 */

namespace jumichica\psjon\math;

class Math{
    /**
     * @param $json Json string to transform
     * @return String
     */
    public function arithmetic($json){
        $pjson="";
        // ENCODE JSON STRING
        $json = json_decode($json);
        // PROCESS THE JSON

        foreach ($json as $rkey => $row) {
            foreach ($row as $key => $value){
                $formula = "";
                $first_character = substr($value, 0, 1);
                $iresult = 0;
                $bformula="";
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
                    $json[$rkey]->$key = "{'formula': '$bformula', 'value':'$iresult'}";
                }
                else{
                    $iresult = $value;
                    $json[$rkey]->$key = $iresult;
                }
            }
        }
        $json = json_encode($json);
        return $json;
    }
}