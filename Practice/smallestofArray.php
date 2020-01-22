<?php
    $array = [19, 100, 23, 56, 87,9];
    $smallest = $array[0];

    for($i = 0 ; $i < count($array) ; $i++){
        if($array[$i] < $smallest){
            $smallest = $array[$i];
        }
    }
    echo "Smallest of Array : ".$smallest;
?>