<form method="GET">
    <input type= "text" name= "Number1" placeholder="Enter Number">
    <input type= "text" name= "Number2" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $number1 = $_GET['Number1'];
    $number2 = $_GET['Number2'];
    $factor1 = [];
    $factor2 = [];
    $j=0;
    if($number1 != "" && $number2 != ""){
        //find factor of number1
    for($i = 1; $i <= $number1 ; $i++){
        if($number1 % $i == 0){
            $factor1[$j] = $i;
            $j++;
        }
    }

    //find factor of number2
    $j=0;
    for($i = 1; $i <= $number2 ; $i++){
        if($number2 % $i == 0){
            $factor2[$j] = $i;
            $j++;
        }
    }

    //find Common Factor array
    $commonFactor = [];
    $k = 0;
    if(count($factor1) > count($factor2)){
        for($i = 0; $i < count($factor1); $i++){
            for($j = 0; $j < count($factor2); $j++){
                if($factor1[$i] == $factor2[$j]){
                    $commonFactor[$k] = $factor1[$i];
                    $k++;
                }
            }
        }
    }
    else{
       for($i =0 ; $i < count($factor2); $i++){
           for($j = 0; $j < count($factor1); $j++){
               if($factor2[$i] == $factor1[$j]){
                    $commonFactor[$k] = $factor2[$i];
                    $k++;
               }
           }
       }
    }

    //find largest from common factor array
    $hcf = 1;
    for($i = 0 ; $i < count($commonFactor) ; $i++){
        if($commonFactor[$i] > $hcf){
            $hcf = $commonFactor[$i];
        }
    }

    echo "HCF of ".$number1 . " and ".$number2 . " : ".$hcf;  
    }
    else{
        echo "Please Enter Number";
    }
      
?>