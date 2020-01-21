<?php
   $myName = "My Name is Bhakti";
   $word = str_word_count($myName,2);
   print_r($word);
   $find = "Name";
   echo "<br>". strpos($myName,$find,2);
   echo "<br>". strtolower($myName);
   echo "<br>". strtolower("BHAKTI");
   echo "<br>". strtoupper($myName);
   echo "<br>". strtoupper("Bhakti");
   echo "<br>". strcmp("Bhakti Vagadia","Bhakti");
   
   $string = "This is string. This is string. This is string.";
   $offset = 0;
   $findString = "string";
   $findStringLength = strlen($findString);

   while($stringPosition = strpos($string, $findString, $offset)){
      echo "<br>". $findString . " at position : ". $stringPosition;
      $offset = $stringPosition + $findStringLength; 
   }

   echo "<br>" . str_replace('World','Bhakti','Hello World!!');
   echo "<br>" . str_replace('string', 'Laptop',$string);
   echo "<br>" . substr_replace("Hello", "World", 5);
   echo "<br>" . substr_replace(" Are You ?", "How", 0, 0);
   echo "<br>" . substr_replace($string, "Laptop", 8, 8);

?>