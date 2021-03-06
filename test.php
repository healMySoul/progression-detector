<?php

function checkProgression($string, $type) {
    $data = explode(',', $string);
    $data = array_map('intval', $data);
    
    switch ($type) {
        case 'arithmetic':
            $calcDiff = function($a, $b) {
                return $a - $b;
            };
            break;
            
        case 'geometric':
            $calcDiff = function($a, $b) {
                return $b != 0 ? $a / $b : 0;
            };
            
            break;
        
        default:
            return false;
    }
    
    if (count($data) > 2) {
        $diff = $calcDiff($data[1], $data[0]);
        
        for ($i = 2; $i <= count($data) - 1; $i++) {
            if ($calcDiff($data[$i], $data[$i - 1]) != $diff) {
                return false;
            }
        }
        
        return true;
    }
    
    return false;
}

$strings = [
    '1,2,3,4,5',
    '1,2,3,5',
    '1,5',
    '5,15,45',
    '0,30,90',
    '1,1,1',
];

foreach ($strings as $string) {
    $progression = false;
    
    foreach (['arithmetic', 'geometric'] as $progressionType) {
        if (checkProgression($string, $progressionType)) {
            $progression = true;
            echo "$string is " . ($progressionType == 'arithmetic' ? 'an': 'a') . " $progressionType progression \n";
        }
    }
    
    if (!$progression) {
        echo "$string is not a progression \n";
    }
}
