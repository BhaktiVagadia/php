
<?php
 $n = 1;
    for($i = 0 ; $i < 15 ; $i+=$n){
        
        echo "<br>";
        for($k = 0 ; $k <= $i ; $k++){
            echo "*";
        }
       
        for($j = 0; $j < $n; $j++){
            echo "0";
        }
        $n++;
    }
?>
