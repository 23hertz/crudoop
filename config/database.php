<?php
$host = "localhost";
$db_name = "crud_oop";
$username = "root";
$password = "sark";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}",$username,$password);
} catch (PDOException $exception) {
    echo "Connection error: ". $exception->getMessage();
}
?>