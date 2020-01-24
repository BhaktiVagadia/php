<?php
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $httpHost = $_SERVER['HTTP_HOST'];
    echo "<br> Script Name : " . $scriptName;
    echo "<br> Host Name : " . $httpHost;
    $images = $httpHost . '/images/';
    echo "<br>".$images;
    echo '<br><img src = "'.$images.'p1.jpg">';
?>