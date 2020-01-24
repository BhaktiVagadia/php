<?php
     session_start();
?>
<html>
    <form   onsubmit='sessionSet.php' method='GET'>
         Username : <input type='text' name='name'>
         Password : <input type='password' name='pwd'>
         <input type='submit' value='Submit'>
    </form>
</html>
<?php
      $_SESSION["userName"] = $_GET['name'];
      $_SESSION["password"] = $_GET['pwd'];
      if( $_SESSION["userName"] != "" && $_SESSION["password"] != ""){
        header('location:sessionGet.php');
      }
      else{
          echo "Please Fill Both Fields";
      }
?>