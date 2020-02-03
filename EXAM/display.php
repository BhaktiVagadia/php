<?php
require_once "blogPost.php";
echo "hello";
function getValue($fieldName){
    if(isset($_POST['viewProfile'])){
        $servername = "localhost";
        $username = "bhakti";
        $password = "1234";
        $dbname="evaluationtest2";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        if(!$conn){
            die("Error in Connection : ". mysqli_connect_error());
        }
            $email = $_SESSION['email'];
            $selectquery = "SELECT $fieldName from user where email = '$email' " ; 
            echo $selectquery;
            // $result = $GLOBALS['conn']->query($selectquery);
            // if($result->num_rows > 0){
            //     while($row = $result->fetch_assoc()){
            //         return $row[$fieldName];
            //     }
            // }
    }
    else{
        return "";
    }
        
}
?>