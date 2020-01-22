<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number of Rows">
    <input type = "submit" >
</form>
<?php
    $rows = $_GET['Number'];
    if($rows != ""){
        echo "<table>";
        for($i = 0; $i < $rows; $i=$i+2)
        {
            echo "<tr>";
            for($j = $rows; $j > $i; $j--)
            {
                echo "<td>*</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "Enter Number of Rows..";
    }
    
?>