<?php
require("config_inc.php");
$dsn = "mysql:host=$servername;dbname=$dbname;charset=UTF8";

try {
  $conn = new PDO($dsn, $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e){
  echo $e->getMessage();
}
