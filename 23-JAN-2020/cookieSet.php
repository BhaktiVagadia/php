<html>
    <form action='cookieSet.php' method='POST'>
         Username : <input type='text' name='name'>
         Password : <input type='password' name='pwd'>
         <input type='submit' name='submit' value='Submit'>
    </form>
</html>
<?php
   
    if(isset($_POST['submit'])){
           setcookie('userName', $_POST['name'], time()+500);
           setcookie('password',$_POST['pwd'], time()+500);
           if( (!empty($_COOKIE['userName'])) && (!empty($_COOKIE['password'])) ){
                    header('Location: cookieGet.php');
           }
           else{
               echo "Enter Both Fields..";
           }
    }
?>