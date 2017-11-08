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
    
    if (count($data) > 3) {
        foreach ($data as $el) {
            
        }
    }
    
    return true;
}

$strings = [
    '1,2,3,4,5',
    '1,2,5',
    '5,15,45',
    '0,30,90',
];

foreach ($strings as $string) {
    foreach (['arithmetic', 'geometric'] as $progressionType) {
        $verb = checkProgression($string, $progressionType) ? 'IS' : 'IS NOT';
        
        echo "$string $verb " . ($progressionType == 'arithmetic' ? 'an': 'a') . " $progressionType progression \n";
    }
}
