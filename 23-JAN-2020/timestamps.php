<?php
    echo "<br>The Current Time is : " . time();
    $time = time();
    echo "<br> The Actual time is : " . date('H i s',$time);
    echo "<br> Today's Date : " . date('d m y');
    echo "<br> Today's Date : " . date('d M Y');
    echo "<br> Today is : " . date('D');
    echo "<br>Current Date/ Time : " . date('d M Y D @ H i s');
    echo "<br>Time Modified : " . date('d M Y D @ H i s' , $time + strtotime('+1week'));
?>