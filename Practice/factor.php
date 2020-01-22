<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $number = $_GET['Number'];
    if($number != ""){
        $factor = [];
        $j=0;
        for($i = 1; $i <= $number ; $i++){
            if($number % $i == 0){
                $factor[$j] = $i;
                $j++;
            }
        }
        echo "Factor of ".$number." :  ";
        for($i = 0; $i < count($factor); $i++){
            echo $factor[$i]." , ";
        }
    }
    else{
        echo "Enter Number";
    }
    
?>