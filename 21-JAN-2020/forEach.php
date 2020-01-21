<?php
    $number = [1, 2, "three" => 3, 4, 5];
    foreach($number as $value){
        echo $value. "   ";
    }
    var_dump($number);

    echo "<br>======================================<br>";
    $cars = [1=>'Volvo', 2=>'BMW', 3=>'Audi'];
    foreach($cars as $no => $carName){
        echo $no. " : ".$carName. " ";
    } 

    echo "<br>======================================";
    $arrayNumaber = [5, 8, 9, 12, 13, 16];
    foreach($arrayNumaber as $result){
        if($result % 2 == 0){
            echo "<br>". $result . " is Odd.";
        }
        else{
            echo "<br>". $result . " is Even.";
        }
    }

    echo "<br>======================================";
    $array = ['Bhakti', 'vagadia', 20.5, 160130107118,true];
    foreach($array as $value){
        echo "<br>". $value .  " is ". gettype($value);
    }

    echo "<br>======================================";
    $multiArray = [array('red', 'green', "white", 'black'), 
                    array('mango', 'orange', 'banana', 'kiwi')];
    foreach($multiArray as $innerArray){
        echo "<br>";
        foreach($innerArray as $element){
            echo $element . "   ";
        }
    }

    echo "<br>======================================<br>";
    $associativeArray = array("name" => 'Bhakti', "age" => 20, "EnNo" => 160130107118);
    foreach($associativeArray as $key){
        echo $key. "    ";
    }

    echo "<br>======================================<br>";
    foreach($associativeArray as $key => $value){
        echo $key . " : " . $value . "    ";
    }

    echo "<br>======================================<br>";
    $fruitColor = array('fruit' =>
                                    array('Grapes', 'Pineapple', 'Apple'),
                         'color' => 
                                    array('Pink','Yellow','Blue'));
    foreach($fruitColor as $key => $value){
        echo "<br>" . $key . " => ";
        foreach($value as $element){
            echo $element." ";

        }
    }

    echo "<br>======================================<br>";
    $arr = array( 1 => "a", "1" => "b" , true => "c" , 1.5 => "d");
    foreach($arr as $element){
        echo "<br>". $element;
    }
?>