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
    function insert($table,$data){
        $columns = implode(",",array_keys($data));      
        $values = implode("','",$data);
        $insertquery = "INSERT INTO $table ($columns) VALUES ('$values') ";
        if(mysqli_query($GLOBALS['conn'],$insertquery)){
            echo "<br>Data insert in table";
        }
        else{
            echo "<br>Error : ". mysqli_error($GLOBALS['conn']);
        }
    }
    function lastId(){
        $query = "SELECT MAX(id) from customers";

        $result = mysqli_query($GLOBALS['conn'],$query);
        
        $row = mysqli_fetch_assoc($result);
        return $row;
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

function displayField($table){
    $query = "SHOW COLUMNS FROM $table";
    $result = $GLOBALS['conn']->query($query);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo"<b>" .$row['Field']."&nbsp &nbsp</b>";
        }
    }      
}

function display($table){
    $userid = lastId();
    $id = $userid['MAX(id)'];
    $query = "SELECT * from $table where id = '$id'";
    $result = $GLOBALS['conn']->query($query);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
        
            foreach($row as $value){
                echo "<br>".$value."&nbsp &nbsp";
            }
        }
    }     
}
function temp(){
    $userid = lastId();
    $id = $userid['MAX(id)'];
    $query = "SELECT C.firstName, C.email, CA.city, HoBY.fieldValue hobbies,GET_IN.fieldValue get_in 
                FROM customers C LEFT JOIN customer_address CA ON C.id = CA.id 
                LEFT JOIN customer_additional_info HOBY ON C.id = HOBY.id AND HOBY.fieldKey ='hobby' 
                LEFT JOIN customer_additional_info GET_IN ON C.id = GET_IN.id AND GET_IN.fieldKey ='getTouch' ";
    $result = $GLOBALS['conn']->query($query);
    return $result;
    // if($result->num_rows > 0){
    //     $row = $result->fetch_row();
    //         foreach($row as $value){
    //             echo "&nbsp &nbsp".$value;
    //         }
      
    // }     
}

?>