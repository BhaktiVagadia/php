<?php
   $myName = "My Name is Bhakti";
   $word = str_word_count($myName,2);
   print_r($word);
   $find = "Name";
   echo "<br>". strpos($myName,$find,2);
   echo "<br>".strtolower($myName);
   echo "<br>".strtoupper($myName);
   echo "<br>".strcmp("Bhakti Vagadia","Bhakti");

?>