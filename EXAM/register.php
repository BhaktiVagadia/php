<?php
    if(isset($_POST['submit'])){
        $_SESSION['createdAt'] = time();
       $data= [];
       $data['prefix'] = $_POST['prefix'];
       $data['firstName'] = $_POST['firstName'];
       $data['lastName'] = $_POST['lastName'];
       $data['mobile'] = $_POST['mobile']; 
       $data['email'] = $_POST['email'];
       $userPassword = $_POST['password'];      
       $data['password'] = md5($userPassword);
       $data['lastLogin'] = 1;//$_SESSION['lastLogin'];
       $data['information'] = $_POST['information'];
       $data['createdAt'] = $_SESSION['createdAt'];
       $data['updatedAt'] = 1; //$_SESSION['lastLogin'];  

       $columns = implode(',', array_keys($data));
       $values = implode("','",array_values($data));

       $servername = "localhost";
    $username = "bhakti";
    $password = "1234";
    $dbname="evaluationtest2";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Error in Connection : ". mysqli_connect_error());
    }
    else{
        echo "connection Sucessfully";
    }

        $email = $data['email'];
       $selectQuery = "SELECT email from user where email = '$email'";
       $row = mysqli_fetch_assoc(mysqli_query($conn,$selectQuery));
       if($row['email'] == $email){
         echo "<br>User already Exists!!";
           header("location:register.html");
       }
       else{
           
           $insertQuery = "INSERT INTO user ($columns) VALUES ('$values')";
           if(mysqli_query($conn,$insertQuery)){
               echo "registration Sucessfully";
               header("location:login.html");
           }
           else{
               echo "<br>Error : ". mysqli_error($conn);
           }
       }
    }
    else{
        echo "submit not set";
    }
    
   
?>