<form method="GET">
    <input type= "text" name= "Number1" placeholder="Enter Number1">
    <input type= "text" name= "Number2" placeholder="Enter Number2">
    <input type = "submit" >
</form>
<?php
    $number1 = $_GET['Number1'];
    $number2 = $_GET['Number2'];

    $multiple1 = [];
    $multiple2 = [];
    $j = 0;

    for($i = 1 ; $i < 100 ; $i++){
        $multiple1[$j] = $number1 * $i;
        $multiple2[$j] = $number2 * $i;
        $j++;
    }

    $k=0;
    $commonMultiple = [];
    for($i = 0 ; $i < 99 ; $i++){
        for($j = 0 ; $j < 99 ; $j++){
            if($multiple1[$i] == $multiple2[$j]){
                $commonMultiple[$k] = $multiple1[$i];
                $k++;
            }
        }
    }

    $lcm = $commonMultiple[0];
    for($i = 0 ; $i < count($commonMultiple) ; $i++){
        if($lcm > $commonMultiple[$i]){
            $lcm = $commonMultiple[$i];
        }
    }

    echo "Lcm of ".$number1 . " and ". $number2 . " : ".$lcm;

?>