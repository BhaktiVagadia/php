<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number of Rows">
    <input type = "submit" >
</form>
<?php
    $number = $_GET['Number'];
    if($number != ""){
        echo "<table border='1px solid'>";
        for($i = 1 ;$i <= $number ; $i++){
            echo "<tr>";
            for($j = 1 ; $j <= $number ;$j++){
                echo "<td>".($i * $j)."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "Enter Number";
    }
    
?>