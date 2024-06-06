<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "<h1>Hello world!</h1>"?>

    <a href="new_login.php">Click here to login</a>
    <a href="new_register.php">Click here to register</a>

    <form action="index.php" method="POST">
        <input type="submit" value="Test DB Connect">
    </form>

    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $database = new DataBase();
        echo $database.dbconnect();
        echo "<p>TEEEST</p>";
    }
    ?>

</body>
</html>