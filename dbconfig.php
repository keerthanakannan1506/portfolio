<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $pdoconn = new PDO("mysql:host=$servername;dbname=portfolio", $username, $password);
    // set the PDO error mode to exception
    $pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>

