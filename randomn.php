<?php
function generatePIN($digits = 4){
    $i = 0; 
    $pin = ""; 
    while($i < $digits){        
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
 
$pin = generatePIN();
//we can just echo $pin in the SMS to the phone.
//we still need assign variable to the code they enter in the code to $pin