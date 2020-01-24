<html>
<form method = "POST">
<input type = "submit" name = "Submit" value = "Roll Dice">
</form>
</html>
<?php

    echo "<br>Maximum Random : " . getrandmax();
    echo "<br>Random : " . rand();
    if(isset($_POST['Submit'])){
        $diceNo = rand(1,6);
        echo "<br><strong>You rolled a : ".$diceNo . "</strong>" ; 
    }
    

?>