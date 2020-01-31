<?php
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        } 
        else if(array_key_exists('button2', $_POST)) { 
            button2(); 
        } 
        function button1() { 
            echo "This is Button1 that is selected"; 
        } 
        function button2() { 
            echo "This is Button2 that is selected"; 
        } 
    ?> 
  
    <form method="post"> 
        <input type="submit" name="button1"
                 value="Button1" /> 
          
        <input type="submit" name="button2"
                 value="Button2" /> 
    </form> 
    