<?php
    require_once "connection.php";
    if( isset($_POST['submit']) || isset($_POST['update']) ){
       $data= [];
       $data['prefix'] = $_POST['prefix'];
       $data['firstName'] = $_POST['firstName'];
       $data['lastName'] = $_POST['lastName'];
       $data['mobile'] = $_POST['mobile']; 
       $data['email'] = $_POST['email'];
       $userPassword = $_POST['password'];      
       $data['password'] = md5($userPassword);
       $data['lastLogin'] = $_SESSION['lastLogin'];
       $data['information'] = $_POST['information'];

       $_SESSION['createdAt'] = date("h,i,s");  
       $data['createdAt'] = $_SESSION['createdAt'];
       
        
       if( isset($_POST['submit'])){
           echo "hello";
            $data['updatedAt'] = 0; 
            $conn =  connection();
            $id = $_SESSION['userid'];
            $selectQuery = "SELECT email from user where userId = $id ";
            $row = mysqli_fetch_assoc(mysqli_query($conn,$selectQuery));
            if($row['email'] == $email){
            echo "<br>User already Exists!!";
                header("location:registerForm.php");
            }
            else{
                insert($data,'user');
                header("location:login.php");
            }
       }
       else if(isset($_POST['update'])){
           echo "id : ".$_SESSION['userid'];
        $data['updatedAt'] = date("h,i,s"); 
        $temp = "";
        foreach($data as $key=>$value){
            $temp .=$key."='".$value."',";
        }
        $updatedata = substr($temp,0,strlen($temp)-1);
        $conn =  connection();
            $email = $data['email'];

                $updateQuery = "UPDATE user set $updatedata where email = '$email' ";
                if(mysqli_query($conn,$updateQuery)){
                    echo "<br>Data update in table";
                    header("location:login.php");
                }
                else{
                    echo "<br>Error into upadate : ". mysqli_error($conn);
                }
       }

    }
    
   
?>