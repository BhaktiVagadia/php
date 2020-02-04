<?php
    function connection(){
        $servername = "localhost";
        $username = "bhakti";
        $password = "1234";
        $dbname="evaluationtest2";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        return $conn;
    }
    function insert($data,$table){
        $conn = connection();
        $columns = implode(',', array_keys($data));
        $values = implode("','",array_values($data));
        $insertQuery = "INSERT INTO $table ($columns) VALUES ('$values')";
        if(mysqli_query($conn,$insertQuery)){
            echo "Data insert in table";
        }
        else{
            echo "Error : ". mysqli_error($conn);
        }
    }
    function update($data,$table,$id){
        $userid = $_SESSION['userid'];
        $temp = "";
        foreach($data as $key=>$value){
            $temp .=$key."='".$value."',";
        }
        $updatedata = substr($temp,0,strlen($temp)-1);
        $conn = connection();
        if($table == 'blog_post'){
             $updateQuery = "UPDATE $table SET $updatedata where postId ='$id' and userId = '$userid'";
        }
        else if( ( $table == 'category') ){
            $updateQuery = "UPDATE $table SET $updatedata where categoryId ='$id' and userId = '$userid'";
        }
        if(mysqli_query($GLOBALS['conn'],$updateQuery)){
            echo "<br>Data update in table";
        }
        else{
            echo "<br>Error into upadate : ". mysqli_error($GLOBALS['conn']);
        }
    }
    function deleteData($table,$id){
        $userid = $_SESSION['userid'];
        $conn = connection();
        if($table == 'category'){
            $deleteQuery = "DELETE FROM $table where categoryId = '$id' and userId = '$userid'";
        }
        else if($table == 'blog_post'){
            $deleteQuery = "DELETE FROM $table where postId = '$id' and userId = '$userid'";
        }
        if(mysqli_query($conn,$deleteQuery)){
            echo "<br>Data delete from ".$table;
        }
        else{
            echo "<br>Error into delete : ". mysqli_error($conn);
        }
    }
    function getValue($fieldName,$table){
       
        $conn = connection();
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email']; 
            $userid = $_SESSION['userid'];         
            if($table == 'user'){
                $selectquery = "SELECT $fieldName from $table where email = '$email' and userId = '$userid' " ; 
            }
            else if( isset($_SESSION['editId']) && ( $table == 'category')){
                $id = $_SESSION['editId'];
                $selectquery = "SELECT $fieldName from $table where categoryId = '$id' and userId = '$userid' " ;
            }
            else if( isset($_SESSION['editId']) && ( $table == 'parentcategory')){
                $id = $_SESSION['editId'];
                $selectquery = "SELECT $fieldName from $table where parentCategoryId = '$id' and userId = '$userid' " ;
            }
            else if( isset($_SESSION['editId']) && ($table == 'blog_post') ){
                $id = $_SESSION['editId'];
                $selectquery = "SELECT $fieldName from $table where postId = '$id' and userId = '$userid' " ;
            }
            if(isset($selectquery)){
                $result =mysqli_query($conn,$selectquery);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        return $row[$fieldName];
                    }
                }
            }
            unset($_SESSION['editId']);   
        }   
         
    }
    function displayBlogPost(){
        $userid = $_SESSION['userid'];
        $conn = connection();
        $selectQuery = "SELECT * from blog_post where userId = '$userid'";
        $result = mysqli_query($conn,$selectQuery);
        return $result;
    }
    function displayCategory(){
        $userid = $_SESSION['userid'];
        $conn = connection();
        $selectQuery = "SELECT * from category where userId = '$userid'";
         $result = mysqli_query($conn,$selectQuery);
         return $result;
    }
?>