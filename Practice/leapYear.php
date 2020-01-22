<form method="GET">
    <input type= "text" name= "year" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $year = $_GET['year'];
    if($year != ""){
        if($year % 4 == 0){
            echo $year . " is Leap Year.";
        }
        else{
            echo $year . " is Not Leap Year.";
        }
    }
    else{
        echo "Enter Year"
    }
    
?>