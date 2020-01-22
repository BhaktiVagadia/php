<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $num = $_GET['Number'];
    $reverseNumber = [];
    $revNum = 0;
    $j=0;
    $temp = $num;
    if($num != ""){
        while($num > 1){
            $r = $num % 10;        
            $reverseNumber[$j] = $r;        
            $j++;
            $num = (int)($num / 10);  
        }   
        for($i = 0; $i < count($reverseNumber); $i++){
            $j--;
            $revNum = $revNum + ($reverseNumber[$i]*pow(10,$j));
        }
        echo "Reverse of " . $temp . " : " . $revNum;
    }
    else{
        echo "Please Enter Number";
    }
?>