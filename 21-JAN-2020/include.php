<?php
    include "head.php";
    echo "<br><strong>This content from Main file</strong><br><br>";
    $lastName = "Vagadia";
    echo "<br> Name : ".$firstName . " ". $lastName;
    include "form.html";
    echo $_GET['name'] . "<br>";
    echo $_GET['email'] . "<br>";
    echo $_GET['MoNo'] . "<br>";
    echo $_GET['birthDate'] . "<br>"; 
    echo $_GET['city'];
   
?>