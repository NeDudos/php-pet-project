<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo '<p> Hello World! 2 </p>'; ?>
    <p> Your browser is <?php echo $_SERVER['HTTP_USER_AGENT'] ?></p>
    <?php 
    if (str_contains($_SERVER['HTTP_USER_AGENT'], 'Chrome')) {
        echo 'You use Chrome';
    }
    ?>

    <form action="action.php" method="post">
        <label for="name"> Your name:</label>
        <input name="name" id="name" type="text">

        <label for="age">Your age:</label>
        <input name="age" id="age" type="text">

        <button type="submit">Submit</button>
    </form>
</body>
</html>