<?php
    $array = [8,9,6,7,5];
    echo "<strong> Before Sorting : </strong> <br>";
    for($i = 0 ; $i < count($array) ; $i++){
        echo "  ".$array[$i];
    }
    for($i = 0 ; $i < count($array) ; $i++){
        for($j = 1 ; $j < count($array) - $i ; $j++){
            if( $array[$j-1] > $array[$j] ){
                $temp = $array[$j-1];
                $array[$j-1] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    echo "<strong> <br>After Sorting : </strong> <br>";
    for($i = 0 ; $i < count($array) ; $i++){
        echo "  ".$array[$i];
    }
?>