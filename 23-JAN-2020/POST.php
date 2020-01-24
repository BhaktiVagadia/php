<html>
    <form Method = "POST"> 
        User Name : <input type = "text" name = "name"><br><br>
        Password : <input type = "password" name = "password"><br><br>
        <input type = "submit" value = "Submit">
    </form>
</html>
<?php
    $name = $_POST['name'];
    $password = $_POST['password'];
    if(!empty($name) && !empty($password)){
        if( $password == ( $name . 123) ){
            echo "Registration Sucessfully";
        }
        else{
            echo "Enter Valid Password";
        }
    }
    else{
        echo "Please Fill All Fields";
    }
?>