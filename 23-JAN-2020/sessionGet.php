<?php
    session_start();
    $name = $_SESSION["userName"];
    $password = $_SESSION["password"];
    echo "<br> Welcome ".$_SESSION["userName"];

    session_unset();

    //unset($_SESSION["userName"]);
    //unset($_SESSION["password"]);
    echo "<br>After Unset Session<br>Name : ".$_SESSION["userName"]." Password : ".$_SESSION["password"];
?>