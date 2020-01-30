<?php
    $servername = "localhost";
    $username = "bhakti";
    $password = "1234";
    $dbname="customer_portal";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Error in Connection : ". mysqli_connect_error());
    }
    else{
        echo "Connection Sucessfully";
    }
    function insert($table,$columns,$values){
        $insertquery = "INSERT INTO $table ($columns) VALUES ('$values') ";
        if(mysqli_query($GLOBALS['conn'],$insertquery)){
            echo "<br>Data insert in table";
        }
        else{
            echo "<br>Error : ". mysqli_error($GLOBALS['conn']);
        }
    }
    function displayValue($section,$fieldName){      
            if($section == 'account'){
                $table = 'customers';
            }
            else if($section == 'address'){
                $table = 'customer_address';
            }
            
            if(isset($_POST['submit'])){
                $value = $_POST[$section][$fieldName];
                $selectquery = "SELECT $fieldName from $table where $fieldName = '$value'  " ; 
            } 
            else{
                $userid = lastId();
                $id = $userid['MAX(id)'];
                $selectquery = "SELECT $fieldName from $table where id = '$id'  " ;
            }          
            $result = $GLOBALS['conn']->query($selectquery);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    return $row[$fieldName];
                }
            }
    }
    function displayValueOther($fieldName){
            if(isset($_POST['other'])){
                $value = $_POST['other'][$fieldName];
                if(is_array($value)){
                    $value= implode(",",$value);
                }
                $selectquery = "SELECT fieldValue from customer_additional_info where fieldKey = '$fieldName' AND fieldValue = '$value' ";            
            }
            else{
                $userid = lastId();
                $id = $userid['MAX(id)'];
                $selectquery = "SELECT fieldValue from customer_additional_info where fieldKey = '$fieldName' AND  id = '$id'";
            }
            $result = $GLOBALS['conn']->query($selectquery);          
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    return $row['fieldValue'];
                }
            }     
    }
    function lastId(){
        $query = "SELECT MAX(id) from customers";

        $result = mysqli_query($GLOBALS['conn'],$query);
        
        $row = mysqli_fetch_assoc($result);
        return $row;
    }   
    

?>