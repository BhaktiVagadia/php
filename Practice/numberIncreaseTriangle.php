<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number of Rows">
    <input type = "submit" >
</form>
<?php
    $row = $_GET['Number'];
    if($row != ""){
        echo "<table>";
        for($i = 1; $i < $row; $i++)
        {
            echo "<tr>";
            for($j = 1; $j <= $i; $j++)
            {
                echo "<td>".$j."</td>";
            }
        }
        echo "</table>";
    }
    else{
        echo "Enter Number of Rows..";
    }
    
?>