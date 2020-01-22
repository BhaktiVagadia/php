<form method="GET">
    <input type= "text" name= "Number1" placeholder="Enter Number">
    <input type= "text" name= "Number2" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $number1 = $_GET['Number1'];
    $number2 = $_GET['Number2'];
    if($number2 != "" && $number1 != ""){
        echo "<strong>Before Swapping</strong><br>Number1 : ".$number1."<br>Number2 : ".$number2;
        $temp;
        $temp = $number1;
        $number1 = $number2;
        $number2 = $temp;
        echo "<br><strong>After Swapping</strong><br>Number1 : ".$number1."<br>Number2 : ".$number2;
    }
    else{
        echo "Enter Numbers";
    }
    
?>