<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number of Rows">
    <input type = "submit" >
</form>
<?php
    $row = $_GET['Number'];
    if($row != ""){
        echo "<table>";
        for($i = 0; $i < $row ; $i++){
            echo "<tr>";
            if($i == 0 || $i == $row-1){
                for($j = 0 ; $j < $row ; $j++) {
                    echo "<td>*</td>";
                }
            }
            else{
                for($j = 0 ; $j < $row ; $j++){
                    if($j == 0 || $j == $row-1){
                        echo "<td>*</td>";
                    }
                    else {
                        echo "<td></td>";
                    }
                }
            }
        }
        echo "</table>";
    }
    else{
        echo "Enter Number";
    }
    
?>