<?php
    $string = "My name is Bhakti";
    $boolean = true;
    if(preg_match("/Bhakti/", $string)){
        echo("<br>Match Found");
    }
    else{
        echo("<br>Match not Found");
    }
    if(preg_match("/laptop/","This is My Laptop")){
        echo("<br>Match Found");
    }
    else{
        echo("<br>Match not Found");
    }
    if(preg_match("/12/",54123)){
        echo("<br>Match Found");
    }
    else{
        echo("<br>Match not Found");
    }
    if(preg_match("/true/",$boolean)){
        echo("<br>Match Found");
    }
    else{
        echo("<br>Match not Found");
    }
    if(preg_match("/true/",true)){
        echo("<br>Match Found");
    }
    else{
        echo("<br>Match not Found");
    }
?>