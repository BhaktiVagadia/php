<?php
  $a = '1';
  echo "<br>".$b = &$a;
  echo "<br>".$c = "2$b";  
  
  echo "<br>============================<br>";

  var_dump(0123 == 123);
  echo "<br>";
  var_dump('0123' == 123);
  echo "<br>";
  var_dump('0123' === 123);

  echo "<br>============================<br>";

  $x = true and false;
  var_dump($x);

  echo "<br>============================<br>";

  $array = array(1 => 'a', '1' => 'b', 1.5 => 'c' , true => 'd');
  print_r($array);
?>