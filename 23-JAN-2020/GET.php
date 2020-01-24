<?php
    $date = $_GET['date'];
    $day = $_GET['day'];
    $year = $_GET['year'];
    echo "<br>Date : " . $date;
    echo "<br>Day : " . $day;
    echo "<br>Year : " . $year;
?>
<html>
    <form method = "GET">
        Date : <input type = "text" name="date"><br><br>
        Day : <input type = "text" name="day"><br><br>
        Year : <input type = "text" name="year"><br><br>
        <input type = "submit" value = "SUBMIT">
    </form>
</html>