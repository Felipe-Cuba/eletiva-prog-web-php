<?php
require_once('config_inc.php');
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // if ($conn) {
    //     echo "Conexão OK!";
    // }
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}

$conn = null;
