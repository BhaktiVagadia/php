<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h2>Welcome !!</h2>
        <h3>Hello From the View</h3>
        <!-- <h1>Output Escaping</h1> -->
        <h2> Hello <?php echo htmlspecialchars($name)." !!!"; ?></h2>
        <ul>
            <?php foreach($fruits as $fruit) : ?>
            <li><?php echo htmlspecialchars($fruit); ?></li>
            <?php endforeach; ?>
        </ul>
        <?php

            // if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //     echo "Hello ".$_POST['name'];
            // }
        ?>
        <!-- <form method='post'>
            <div>
                <label for="name">Name</label>
                <input id='name' name='name' autofocus>
            </div> 
            <div>
                <button type='submit'>Submit</button>
            </div> 
        </form> -->
    </body>
</html>