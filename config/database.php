<?php
$host = "remotemysql.com";
$db_name = "qh0WYOuiW3";
$username = "qh0WYOuiW3";
$password = "A5id5GyPcq";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}",$username,$password);
} catch (PDOException $exception) {
    echo "Connection error: ". $exception->getMessage();
}
?>
