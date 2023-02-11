<?php
$host = "localhost";
$user = "root";
$pass = "";
// $pass = "root";
$dbname = "calculoImc";

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Connection successfuly';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}