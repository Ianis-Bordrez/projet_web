<?php
require_once('config.php');



$req = $db->prepare("INSERT INTO `player` (`account_id`, `name`, `class`, `gender`) VALUES (:account_id, :name, :class, :gender)");
$req->bindParam('account_id', $_SESSION["account_id"]);
$req->bindParam('name', $_POST["name"]);
$req->bindParam('class', $_POST["class"]);
$req->bindParam('gender', $_POST["gender"]);
$req->execute();

header('Location: ../index.php');
exit();
?>