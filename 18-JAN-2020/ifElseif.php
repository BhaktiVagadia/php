<?php
    $age = 20;
    if($age < 18){
        echo "<br>Your age is under 18";
    }
    else if($age > 18){
        echo "<br>Your Age is Greater than 18";
    }
    else{
        echo "<br>Your age is 18";
    }

    $number1 = 20;
    $number2 = 70;
    if($number1 >= 50 && $number2 >=50){
        echo "<br>Both Number are Greather than 50";
    }
    else if($number1 < 50 && $number2 <50){
        echo "<br>Both Number are Less than 50";
    }
    else if($number1 > 50 && $number2 < 50){
        echo "<br>Number 1 is Greather than 50 & number 2 less than 50";
    }
    else{
      echo "<br>Number 2 is Greather than 50 & number 1 less than 50";
    }

    if($number1 > 50 && $number2 >50){
        echo "<br>Both Number are Greather than 50";
    }
    else if($number1 < 50 && $number2 <50){
        echo "<br>Both Number are Less than 50";
    }
    else if($number1 > 50 && $number2 < 50 || $number1 < 50 && $number2 > 50){
        echo "<br>One is Greather than 50 and another is less than 50";
    }
    else{
        echo"<br> Both are 50";
    }

    $day = "monday";
    if($day == "saturday"){
        echo "<br>Today is Saturday";
    }
    else if($day != "sunday" && $day != "saturday"){
        echo " <br>Today is Weekday ";
    }
    else{
        echo "<br>Today is Sunday";
    }

    $boolean1 = true;
    $boolean2 = false;
    if ($boolean1 && $boolean2){
        echo "<br>Both are True";
    }
    else if (!$boolean2 && !$boolean1){
        echo "<br>Both are False";
    }
    else{
        echo "<br>One is True and Another is False";
    }

?>