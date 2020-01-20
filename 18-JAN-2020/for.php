<?php
    for($i = 0; $i < 5; $i++)
    {
        echo "   ". ($i + 1);
    }

    echo "<br><br>";

    for($i = 0; $i < 5; $i++)
    {
        echo "<br>";
        for($j = 0; $j <= $i; $j++)
        {
            echo "  *";
        }
    }
    echo "<br><br>";
    $n=1;
    for($i = 0; $i < 5; $i++)
    {
        echo "<br>";
        for($j=0;$j<=$i;$j++)
        {
            echo "  ".$n;
            $n++;
        }
    }
    echo "<br><br>";
    for($i = 0; $i < 5; $i++)
    {
        echo "<br>";
        for($j = 5; $j > $i; $j--)
        {
            echo "  *";
        }
    }
    echo "<br><br>";

    for($i = 0; $i < 5; $i++)
    {
        echo "<br>";
        for($k = 5; $k > $i; $k--)
        {
            echo "&nbsp     ";
        }
        for($j = 0; $j <= $i; $j++)
        {
            echo "*&nbsp     ";
        }

    }
    echo "<br><br>";
    for($i = 0; $i < 5; $i++)
    {
        echo "<br>";
        for($k = 0; $k < 5-$i; $k++)
        {
            echo "&nbsp     ";
        }
        for($j = 0; $j <= $i; $j++)
        {
            echo "*";
        }

    }

?>