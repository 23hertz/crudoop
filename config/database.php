<?php
$host = "xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$db_name = "u56z3i0lke85iigj";
$username = "o3qbj4q55et5icd2";
$password = "cp1g60bf1h8ey8f3";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}",$username,$password);
} catch (PDOException $exception) {
    echo "Connection error: ". $exception->getMessage();
}
?>
