<?php
    $firstName = "Bhakti";
    $string = "  My name is Bhakti Vagadia";

    echo "<br>Number of Words in String : ".str_word_count($string);
    echo "<br>Reverse String : ". strrev($firstName);
    echo "<br>ltrim String : ". ltrim($string,"My");
    echo "<br>String Length : ". strlen($string);
    echo "<br>Number of character before 't' in string Bhakti : ". strcspn($firstName,'t');
    echo "<br>Array of words of string : ";
    print_r(str_word_count($string,1));
    echo "<br>Suffled String : ". str_shuffle($firstName);
    echo "<br>Sub String : ". substr($string , 13);
    similar_text($firstName,$string,$result);
    echo "<br>Similar text : ".$result;
?>