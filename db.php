<?php

class DataBase 
{
    protected const DB_SETTINGS = array(
        'host' => 'localhost:3306',
        'user' => 'php_user',
        'password' => 'php_pass'
    );

    function dbconnect () {
        $mysqli = new mysqli(DB_SETTINGS['host'], DB_SETTINGS['user'], DB_SETTINGS['password']);

        if ($mysqli->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        return "<p>Connection successful</p>";
    }


}

?>