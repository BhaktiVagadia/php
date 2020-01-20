<?php
    function myName($name){
        echo "My Name is : ".$name;
    }
    myName("Bhakti");

    function addition($num1,$num2){
        $sum = $num1+$num2;
        echo "<br>Sum is : ".$sum;
    }
    addition(4,5);

    function countAge($birthYear){
        $age = 2020 - $birthYear;
        echo "<br>Age is : ".$age;
    }
    countAge(1999);

    function checkBoolean($boolean){
        echo "<br>". $boolean;
    } 
    checkBoolean(true);

    function fullName($firstName, $lastName){
        echo "<br>Name : ".$firstName."  ".$lastName;
    }
    fullName("Bhakti","Vagadia");
?>