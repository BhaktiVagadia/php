<?php
    function myName($name){
        return $name;
    }
    $name = myName("Bhakti");
    echo "My name is : ".$name;

    function Addition($num1,$num2){
        return $num2 + $num1;
    }
    $sum = Addition(5,4);
    echo "<br>Addition : ".$sum;

    function Multiplication($num1){
        $num2 = 10;
        return $num1 * $num2;
    }
    $mul = Multiplication(5);
    echo "<br>Multiplication : ".$mul;

    function countAge($birthYear){
        $age = 2020 - $birthYear;
        return $age;
    }
    $age = countAge(1999);
    echo " <br>Count Age : ".$age;

    function additionMultiplication($num1){
        $num2 = Addition(10,20);
        return $num1 * $num2;
    }
    $result = additionMultiplication(5);
    echo "<br>Result : ".$result;
   
?>