<form method="GET">
    <input type= "text" name= "Number1" placeholder="Enter String 1">
    <input type= "text" name= "Number2" placeholder="Enter String 2">
    <input type = "submit" >
</form>
<?php
    $string1 = $_GET['Number1'];
    $string2 = $_GET['Number2'];
    $concatString = "";
    if( strlen($string1) < strlen($string2) ){
        for($i = 0; $i < strlen($string1) ; $i++){
            $concatString = $concatString . $string1[$i].$string2[$i];
        }
        for($i = strlen($string1) ; $i < strlen($string2) ; $i++){
            $concatString = $concatString.$string2[$i];
        }
    }
    else{
        for($i = 0; $i < strlen($string2) ; $i++){
            $concatString = $concatString . $string1[$i].$string2[$i];
        }
        for($i = strlen($string2) ; $i < strlen($string1) ; $i++){
            $concatString = $concatString.$string1[$i];
        }
    }
    echo "<br>String 1 : ".$string1;
    echo "<br>String 2 : ".$string2;
    echo "<br>Concat String : " . $concatString;
?>