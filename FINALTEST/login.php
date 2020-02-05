<?php
    session_start();;
?>
<html>
<form method = 'POST' action="login.php">
    <input type="email" name="data[userEmail]" placeholder="Enter Email" ><br><br>
    <input type="password" name="data[userPassword]" placeholder="Enter Password"><br><br>
    <input type='submit' name='login' value='login'>
    <input type='submit' name='register' value='register'>
</form>
</html>
<?php
    require_once "connection.php";
    $conn = connection();
    if(!$conn){
        die("Error in Connection : ". mysqli_connect_error());
    }
    if(isset($_POST['login'])){
        $password = $_POST['data']['userPassword'];
        $hashPassword = md5($password);
        $email = $_POST['data']['userEmail'];
        $selectQuery = "SELECT * from user where password = '$hashPassword' and email = '$email' ";
        $result = mysqli_fetch_assoc(mysqli_query($conn,$selectQuery));
        $_SESSION['email'] = $result['email'];
        $_SESSION['userid'] = $result['userId'];
        if(! mysqli_fetch_row(mysqli_query($conn,$selectQuery)))
        {
            echo "<br>Invalid Username or Password !!<br>If you haven't Register Register First!!<br>"; 
        }
        else{
            $_SESSION['lastLogin'] = date("h,i,s");
            header("location:blogPost.php");
        }
    }
    else if(isset($_POST['register'])){
        header("location:registerForm.php");
    }
    
?>