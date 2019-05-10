<?php
include ('common.php');
$pdo = get_conn();
$name = $_POST['name'];
$sql = $pdo->prepare("update foods set shopping_list = '0' where name = :name");
$sql->bindParam(':name', $name);
$sql->execute();
?>