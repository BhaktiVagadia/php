<?php
    session_start();
?>
<html>
    <form method="POST">
        <input type="number" name='month1' placeholder="Enter Month1">
        <input type="number" name='year1' placeholder="Enter year1"><br><br>
        <input type="number" name='month2' placeholder="Enter Month2">
        <input type="number" name='year2' placeholder="Enter year2"><br><br>
        <input type="submit" name="submit" value="Get Calender" >
    </form>
</html>
<?php
if(isset($_POST['submit'])){
    $_SESSION['Month1'] = $_POST['month1'];
    $_SESSION['Year1'] = $_POST['year1'];
    $_SESSION['Month2'] = $_POST['month2'];
    $_SESSION['Year2'] = $_POST['year2'];

    $month1 = $_SESSION['Month1'];
    $month2 = $_SESSION['Month2'];
    $year1 = $_SESSION['Year1'];
    $year2 = $_SESSION['Year2'];
    
    if($year1 < $year2){
        for($i = $month1 ; $i <= 12 ; $i++){
            calender($i ,$year1);
        }
        for($i = 1 ; $i <= $month2 ;$i++ ){
            calender($i , $year2);
        }
    }
    else if($year1 == $year2){
        for($i = $month1 ; $i <= $month2 ; $i++){
            calender($i ,$year1);
        }
    }
    else if($year1 > $year2){
        echo "Year1 should be less than Year2";
    }
}
else{
    echo "Enter All fields";
}
function calender($month,$year){
    $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    $firstday = date("l",mktime(0,0,0,$month,1,$year));
    $NoDays = cal_days_in_month(CAL_GREGORIAN,$month,$year);

    echo "<br>".$month ." ". $year ."<br><br>";
    echo "<table border='1px solid'>";
    echo "<tr><td>Sunday</td><td>Monday</td>
    <td>Tueday</td>
    <td>Wednesday</td>
    <td>Thursday</td>
    <td>Friday</td>
    <td>Saturday</td></tr>";
    $n =1;
    for($i = 0; $i<7;$i++){
        if($firstday == $days[$i]){
            $startday = $i;
        }
    }
    for($i = 0; $i<7;$i++){
        echo "<tr>";
        if($i == 0){
            for($j = 0; $j < $startday; $j++){
                echo "<td></td>";
            }
            for($j=$startday ; $j < 7; $j++){
                echo "<td>".$n."</td>";
                $n++;
            }
        }
        else{
            for($j = 0; $j<7; $j++){
                if($n > $NoDays){
                    break;
                }
                else{
                    echo "<td>".$n."</td>";
                    $n++;
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}    
?>