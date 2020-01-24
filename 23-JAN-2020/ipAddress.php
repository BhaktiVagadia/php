<?php
   $ipAddress = $_SERVER['REMOTE_ADDR'];
   echo $ipAddress; 
   $httpClientIp = $_SERVER['HTTP_CLIENT_IP'];
   $httpForwardedFor = $_SERVER['HTTTP_X_FORWARDED_FOR'];
   echo "<br>".$httpClientIp;
   echo "<br>".$httpForwardedFor;
?>