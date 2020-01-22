<?php
    $array = [19, 100, 23, 56, 87];
    $highest = $array[0];

    for($i = 0 ; $i < count($array) ; $i++){
        if($array[$i] > $highest){
            $highest = $array[$i];
        }
    }
    echo "Highest of Array : ".$highest;
?>