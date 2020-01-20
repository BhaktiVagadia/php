<?php
$num1 = 5;
$num2 = 10;
    function myName(){
        echo "Bhakti";
    }
    echo "My Name is : ";
    myName();

    
    function sum(){
        $sum = $GLOBALS['num1'] + $GLOBALS['num2'];
        echo "<br>Sum is : ".$sum;
    }
    sum();

    function multiplication(){
        $sum = $GLOBALS['num1'] * $GLOBALS['num2'];
        echo "<br>Multiplication is : ".$sum;
    }
    multiplication();

    function countAge(){
        $birthYear = 1999;
        $age = 2020 - $birthYear;
        echo "<br> Age : ".$age ;
    }
    countAge();
?>