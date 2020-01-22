<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number of Rows">
    <input type = "submit" >
</form>
<?php
    $row = $_GET['Number'];
    if($row != ""){
        echo "<table>";
        for($i = 0; $i < $row; $i++)
        {
            echo "<tr>";
            for($j = $row,$n = 1; $j > $i; $j--,$n++)
            {
                echo "<td>".$n."</td>";
            }
        }
        echo "</table>";
    }
    else{
        echo "Enter Number of Rows..";
    }
    
?>