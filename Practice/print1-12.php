<form method="GET">
    <input type= "text" name= "Number1" placeholder="Enter Number of Rows">
    <input type= "text" name= "Number2" placeholder="Enter Number of Columns">
    <input type = "submit" >
</form>
<?php
$row = $_GET['Number1'];
$column = $_GET['Number2'];

    for($i = 0 ;$i <  $row; $i++){
        echo "<br>";
        for($j = 0,$n = $i+1 ;$j < $column; $j++,$n=$n+$row){
            echo $n . " "; 
        }
    }
?>