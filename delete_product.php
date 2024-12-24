<?php
include 'init.php';
session_start();
$id = $_GET['id'];
$q="DELETE FROM products WHERE id=$id";
$stmt=$pdo->prepare($q);
$stmt->execute();
header("location:admin.php");
$id = null;
exit();

