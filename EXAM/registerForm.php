<html>
    <form method = 'POST'>
        prefix : 
        <select name='prefix'>
            <option>Mr</option>
            <option>Ms</option>
            <option>Miss</option>
        </select><br><br>
        First Name : <input type="text" value="<?php echo getValue('firstName'); ?>" name='firstName'><br><br>
        Last Name : <input type="text" name='lastName' value="<?php echo getValue('lastName'); ?>" ><br><br>
        Email : <input type="email" name="email" value="<?php echo getValue('email'); ?>" ><br><br>
        Mobile Number : <input type="text" name="mobile" value="<?php echo getValue('mobile'); ?>" ><br><br>
        Password : <input type="password" name="password" value="<?php echo getValue('password'); ?>" ><br><br>
        Confirm Password : <input type="password" name="confirmPassword"><br><br>
        Information : <textarea name="information"  cols="30" rows="5" value="<?php echo getValue('information'); ?>" ></textarea><br><br>
        <input type="checkbox" name="term&condi">Hereby,I Accept Terms & Condition<br><br>
        <input type="submit" name="submit">
    </form>
</html>
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
       echo $insertQuery;
       if(mysqli_query($conn,$insertQuery)){
           echo "registration Sucessfully";
           header("location:login.html");
       }
       else{
           echo "<br>Error : ". mysqli_error($conn);
       }
   }
}

?>