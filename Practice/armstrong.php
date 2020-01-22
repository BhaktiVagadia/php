<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $number = $_GET['Number'];
    $sum = 0;
    $temp = $number;
    if($number != ""){
        while($temp){
            $r = $temp % 10;
            $sum = $sum + ($r * $r * $r);
            $temp = $temp / 10;      
        }
        if($sum == $number){
            echo $number . " is Armstrong Number";
        }
        else{
            echo $number . " is Not Armstrong Number";
        }
    }
    else{
        echo "Please Enter Number";
    }
    
?>