<?php
    require_once "connection.php";
?>
<html>
    <form method = 'POST' enctype="multipart/form-data">
        prefix : 
        <select name='prefix'>
            <option>Mr</option>
            <option>Ms</option>
            <option>Miss</option>
        </select><br><br>
        First Name : <input type="text" value="<?php echo getValue('firstName','user'); ?>" name='firstName'><br><br>
        Last Name : <input type="text" name='lastName' value="<?php echo getValue('lastName','user'); ?>" ><br><br>
        Email : <input type="email" name="email" value="<?php echo getValue('email','user'); ?>" ><br><br>
        Mobile Number : <input type="text" name="mobile" value="<?php echo getValue('mobile','user'); ?>" ><br><br>
        Password : <input type="password" name="password" value="<?php echo getValue('password','user'); ?>" ><br><br>
        Confirm Password : <input type="password" name="confirmPassword"><br><br>
        Information : <textarea name="information"  cols="30" rows="5" ><?php echo getValue('information','user'); ?></textarea><br><br>
        <input type="checkbox" name="term&condi">Hereby,I Accept Terms & Condition<br><br>
        <input type="submit" name="submit"> 
        <input type="submit" name="update" value='update'> 
    </form>
</html>
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
       $_SESSION['createdAt'] = date('D/M/Y h:i:s',time());  
       $data['createdAt'] = $_SESSION['createdAt'];
        
       if( isset($_POST['submit'])){
            $data['updatedAt'] = 0; 
            $conn =  connection();
            $email = $_POST['email'];
            $selectQuery = "SELECT email from user";
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
        $id = $_SESSION['userid'];
        $data['updatedAt'] = date('D/M/Y h:i:s',time()); 
        echo $data['updatedAt'] ;
        $temp = "";
        foreach($data as $key=>$value){
            $temp .=$key."='".$value."',";
        }
        $updatedata = substr($temp,0,strlen($temp)-1);
        $conn =  connection();
        $email = $data['email'];
        $updateQuery = "UPDATE user set $updatedata where userId = '$id' ";
        if(mysqli_query($conn,$updateQuery)){
            echo "<br>Data update in table";
            //header("location:login.php");
        }
        else{
            echo "<br>Error into upadate : ". mysqli_error($conn);
        }
       }

    }
    
   
?>