<?php
    require_once "display.php";
?>
<html>
    <form method = 'POST' action="register.php">
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