<form method="GET">
    <input type= "text" name= "Number" placeholder="Enter Number of Rows">
    <input type = "submit" >
</form>
<?php
    $row = $_GET['Number'];
    if($row != ""){
        echo "<table> ";
        for($i = 0 ;$i < $row ; $i++){
            echo "<tr>";
            for($j = 0 ; $j < $row ; $j++){
                if($i % 2 == 0){
                    if($j % 2 == 0){
                        echo "<td style='background-color: rgb(238, 206, 179); height:20px ; width:20px'></td>";
                    }
                    else{
                        echo "<td style='background-color:black ; height:20px ; width:20px'></td>";
                    }
                }
                else{
                    if($j % 2 == 0){
                        echo "<td style='background-color:black ; height:20px ; width:20px'></td>";
                    }
                    else{
                        echo "<td style='background-color: rgb(238, 206, 179) ; height:20px ; width:20px'></td>";
                    }  
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "Enter number";
    }
    
?>