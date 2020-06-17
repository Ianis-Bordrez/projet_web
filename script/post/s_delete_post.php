<?php
require_once('../config.php');

isNotConnectedRedirect();

if(!isset($_POST['pid'])) {
    redirect("../../forum.php");
}

$req = $db->prepare('SELECT account_id FROM post WHERE post_id=:pid');
$req->bindParam('pid' , $_POST['pid']);
$req->execute();
$post_id = $req->fetch()['account_id'];
$req->closeCursor();

if ($_SESSION['account_id'] != $post_id && $_SESSION["status"] != "ADMIN") {
    redirect("../forum.php");
}

$req = $db->prepare('DELETE FROM post WHERE post_id=:pid');
$req->bindParam('pid' , $_POST['pid']);
$req->execute();
$req->closeCursor();

$req = $db->prepare('DELETE FROM answer WHERE post_id=:pid');
$req->bindParam('pid' , $_POST['pid']);
$req->execute();
$req->closeCursor();


redirect("../../forum.php");
?>