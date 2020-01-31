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
        if(isset($_GET['viewbtn']) || isset($_GET['editbtn'])){
            if(isset($_GET['viewbtn'])){
                $id = array_search('view',$_GET['viewbtn']);
            }
            else if(isset($_GET['editbtn'])){
                $id = array_search('edit',$_GET['editbtn']);
            } 
            $selectquery = "SELECT $fieldName from $table where id = '$id'  " ; 
            $result = $GLOBALS['conn']->query($selectquery);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    return $row[$fieldName];
                }
            }
        }                  
    }
    function displayValueOther($fieldName){
        if(isset($_GET['viewbtn']) || isset($_GET['editbtn'])){
            if(isset($_GET['viewbtn'])){
                $id = array_search('view',$_GET['viewbtn']);
            }
            else if(isset($_GET['editbtn'])){
                $id = array_search('edit',$_GET['editbtn']);
            }            
            $selectquery = "SELECT fieldValue from customer_additional_info where fieldKey = '$fieldName' AND id = '$id' ";            
            $result = $GLOBALS['conn']->query($selectquery);          
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    return $row['fieldValue'];
                }
            } 
        }           
    }  
    function display(){
        $query = "SELECT C.id, C.firstName, C.email, CA.city, HoBY.fieldValue hobbies,GET_IN.fieldValue get_in 
                    FROM customers C LEFT JOIN customer_address CA ON C.id = CA.id 
                    LEFT JOIN customer_additional_info HOBY ON C.id = HOBY.id AND HOBY.fieldKey ='hobby' 
                    LEFT JOIN customer_additional_info GET_IN ON C.id = GET_IN.id AND GET_IN.fieldKey ='getTouch' ";
        $result = $GLOBALS['conn']->query($query);
        return $result;    
    }
    function update($id,$table,$data){ 
        $temp = "";
    foreach($data as $key=>$value){
        $temp .=$key."='".$value."',";
    }
    $updatedata = substr($temp,0,strlen($temp)-1);
    $updateQuery = "UPDATE $table SET $updatedata where id ='$id'";
        if(mysqli_query($GLOBALS['conn'],$updateQuery)){
            echo "<br>Data update in table";
        }
        else{
            echo "<br>Error into upadate : ". mysqli_error($GLOBALS['conn']);
        }
    }
    function updateOther($id,$table,$data){
        $temp = "";
        foreach($data as $key=>$value){
            $temp .=$key."='".$value."',";
        }
        $fieldKey = $data['fieldKey'];
        $updatedata = substr($temp,0,strlen($temp)-1);
        $updateQuery = "UPDATE $table SET $updatedata where id ='$id' and fieldKey = '$fieldKey'";
        if(mysqli_query($GLOBALS['conn'],$updateQuery)){
            echo "<br>Data update in table";
        }
        else{
            echo "<br>Error into upadate : ". mysqli_error($GLOBALS['conn']);
        }
    }
    function deleteData($id,$table){
        $deleteQuery = "DElETE FROM $table where id = '$id' ";
        if(mysqli_query($GLOBALS['conn'],$deleteQuery)){
            echo "<br>Data delete from ".$table;
        }
        else{
            echo "<br>Error into delete : ". mysqli_error($GLOBALS['conn']);
        }
    }
?>