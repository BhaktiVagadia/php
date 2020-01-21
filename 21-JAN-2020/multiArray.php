<?php
  $food = array('Healthy' => array('salad','fruit','sprout'), 'Unhealthy' => array('pizza','pasta','dosha'));
  print_r($food['Healthy']);
  echo"<br>";
  print_r($food['Unhealthy']); 
  
  $number = array([1,2,3],[9,8,7]);
  echo"<br>";
  print_r($number);

  $students = array([1,'Bhakti','Vagadia',20],[2,'Ruchita','Vagadia',21],[3,'Drashti','Patel',19]);
  for($i = 0; $i < count($students); $i++){
      echo "<br>";
      for($j = 0; $j < 4; $j++){
          echo "   " . $students[$i][$j];
      }
  }
?>