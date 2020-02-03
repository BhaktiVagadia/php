<?php
    session_start();
    $servername = "localhost";
    $username = "bhakti";
    $password = "1234";
    $dbname="evaluationtest2";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Error in Connection : ". mysqli_connect_error());
    }
    else{
        echo "Connection Sucessfully";
    }

    if(isset($_POST['login'])){
        $password = $_POST['data']['userPassword'];
        $hashPassword = md5($password);
        $email = $_POST['data']['userEmail'];
        $selectQuery = "SELECT * from user where password = '$hashPassword' and email = '$email' ";
        echo $selectQuery;
        $result = mysqli_fetch_assoc(mysqli_query($conn,$selectQuery));
        $_SESSION['email'] = $result['email'];
        echo "<br>username : ".$name."<br>";
        if(! mysqli_fetch_row(mysqli_query($conn,$selectQuery)))
        {
            echo "<br>Invalid Username or Password !!<br>If you haven't Register Register First!!<br>";
            echo "<a href='register.html'>Click Here for Registration</a>"; 
            //header("location:register.html");
        }
        else{
            $_SESSION['lastLogin'] = time();
            header("location:blogPost.php");
        }
    }
    else if(isset($_POST['register'])){
        header("location:registerForm1.php");
    }
?>