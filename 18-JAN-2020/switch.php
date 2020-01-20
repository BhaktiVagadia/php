<?php

    $day = 6;
    switch($day){
        case 1 :
            echo "Sunday";
            break; 
        case 2 :
            echo "Monday";
            break; 
        case 3 :
            echo "Tuesday";
            break; 
        case 4 :
            echo "Wednesday";
            break; 
        case 5 :
            echo "Thursday";
            break; 
        case 6 :
            echo "Friday";
            break; 
        case 7 :
            echo "Saturaday";
            break; 
        default :
            echo "Invalid";
            break;
    }

    $op = '*';
    $num1 = 50;
    $num2 = 40;
    switch($op){
        case '+' :
            echo "<br>". $num1 + $num2;
            break;
        case '-' :
            echo "<br>". $num1 - $num2;
            break;
        case '*' :
            echo "<br>" . $num1 * $num2;
            break;
        case '/' :
            echo "<br>". $num1 / $num2;
            break;
        default :
            echo "Invalid";
            break;

    }

    $flag = false;
    switch($flag){
        case true :
            echo "<br>True ";
            break;
        case false :
            echo "<br>False";
            break;
        default :
            echo "Invalid";
            break;
        
    }

    $option = 2;
    switch($option){
        case 1 :
            echo "<br>You Choose 1";
            break;
        case 2 :
            echo "<br>You Choose 2";
            break;
        case 3 :
            echo "<br>You Choose 3";
            break;
        case 4 :
            echo "<br>You Choose 4";
            break;
        default :
            echo "<br>Invalid";
            break;
}

    $g

?>