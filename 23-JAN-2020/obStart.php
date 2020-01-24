<?php
    ob_start();
?>
<h2>MY PAGE</h2>
<?php
    $redirect = true;
    $redirect_page = 'http://google.com';
    if($redirect == true){
        header('Location: ' . $redirect_page);
    }
    ob_end_flush();
?>