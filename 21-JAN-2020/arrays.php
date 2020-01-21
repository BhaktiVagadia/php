<?php
    $array = [1,2,3];
    print_r($array);
    echo "<br> Lenngth of Array : ". count($array)."<br>";

    $cars = array('volvo','nano','audi','bmw');
    print_r($cars);
    echo "<br>Array : ".$cars[0]."   ".$cars[1]."   ".$cars[2]."   ".$cars[3]."<br>";
    $cars[4] = "toyota";
    print_r($cars);

    $food = ["Pasta","Maggi","Noodles"];
    echo "<br>";
    print_r($food);
    echo "<br>";
    $food[0]="Macroni";
    print_r($food);
?>