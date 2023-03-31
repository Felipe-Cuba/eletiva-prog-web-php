<?php

if (isset($_GET['item_id'])) {
  require "connection.php";

  $id = $_GET['item_id'];

  $sql = "DELETE FROM cursos WHERE id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  header("location: curso-list.php");
  exit;
}
