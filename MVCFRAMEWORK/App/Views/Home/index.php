<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h2>Welcome !!</h2>
        <h3>Hello From the View</h3>
        <h2> Hello <?php echo htmlspecialchars($name)." !!!"; ?></h2>
        <ul>
            <?php foreach($fruits as $fruit) : ?>
            <li><?php echo htmlspecialchars($fruit); ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>