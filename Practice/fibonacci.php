<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number">
    <input type = "submit" >
</form>
<?php
    $no = $_GET['Number'];
    $n1 = 0;
    $n2 = 1;
    if($no != ""){
        echo $n1 . "    ".$n2;
        for($i = 1; $i < $no; $i++){
            $sum = $n1 + $n2;
            echo "  ".$sum;
            $n1 = $n2;
            $n2 = $i; 
        }
    }
    else{
        echo "Please Enter Number of Elements..";
    }
     
?>