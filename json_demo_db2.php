<?php
header("Content-Type: application/json; charset=UTF-8");

$obj = json_decode($_GET["content"], false);

$conn = new mysqli("localhost", "root", "as8534", "chat");

mysqli_query ($conn, 'SET NAMES utf8');

$chatuser = addslashes($obj->chatuser);

$chattext = addslashes($obj->chattext);

$chatpassword = addslashes($obj->chatpassword);

$chattime = addslashes($obj->chattime);

prepare("INSERT INTO $obj->table(chatuser,chattext,chatpassword,chattime)
VALUES ('$chatuser','$chattext','$chatpassword','$chattime')");

$stmt->execute();

$result = $stmt->get_result();


$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>
