<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $number = $_GET['Number'];
    if($number != ""){
        for($i = 1; $i <= 10; $i++){
            echo "<br>".$number . " * ".$i." = ".($number * $i);
        }
    }
    else{
        echo "Enter Number";
    }
    
?>