<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $number = $_GET['Number'];
    if($number != ""){
        $factorial = 1 ; 
        for($i = 1; $i <= $number; $i++){
            $factorial = $factorial * $i;
        }
        echo "Factorial of ".$number ." : ".$factorial;
    }
    else{
        echo "Please Enter Number of Elements..";
    }
?>