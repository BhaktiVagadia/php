<?php
    $array = [11,2,7,5,8,9,4];

    $highest = 0;
    $secondHighest = 0;

    for($i = 0 ; $i < count($array) ;$i++ ){

        if( $array[$i] > $highest && $array[$i] > $secondHighest ){
            $secondHighest = $highest;
            $highest = $array[$i];
        }
        else if ( $array[$i] < $highest && $array[$i] > $secondHighest ){
            $secondHighest = $array[$i];
        }
    }
    echo "Second Highest of Array : ".$secondHighest;
?>