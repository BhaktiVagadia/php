<form method="GET">
    <input type= "text" name= "Number1" placeholder="Enter Number of Rows">
    <input type= "text" name= "Number2" placeholder="Enter Number of Rows">
    <input type = "submit" >
</form>
<?php
    $row = $_GET['Number1'];
    $column = $_GET['Number2'];

    if($row != "" && $column != ""){
        echo "<table border='1px solid'>";
        for($i = 1; $i <= $row ; $i++){
            echo "<tr>";
            for($j = 1; $j <= $column ; $j++){
                echo "<td>".$i." * ".$j." = ".($i * $j)."</td>";
            }
            echo "</tr>";
        }
    }
    else{
        echo "Enter Number";
    }
    
?>