<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $num = $_GET['Number'];
    $flag = true;
    if($num != ""){
        for($i = 2; $i < $num; $i++){
            if($num % $i == 0){
                $flag = false;
            }
        }
        if($flag == true){
            echo $num." is Prime Number.";
        }
        else{
            echo $num." is Not Prime Number.";
        }
    }
    else{
        echo "Please Enter Number";
    }
     
?>