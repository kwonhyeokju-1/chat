<?php
header("Content-Type: application/json; charset=UTF-8");

$obj = json_decode($_GET["content"], false);

$conn = new mysqli("localhost", "root", "as8534", "chat");

mysqli_query ($conn, 'SET NAMES utf8');

$stmt = $conn->prepare("SELECT * FROM $obj->table");

$stmt->execute();

$result = $stmt->get_result();

$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

?>
