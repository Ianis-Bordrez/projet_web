<?php 
require_once('config.php');


if(empty($_POST['post_title']) || empty($_POST['post_text'])){
    header('Location: ../forum.php');
    exit();
}

if (isConnected()) {
    $title = htmlspecialchars($_POST['post_title']);
    $answer = htmlspecialchars($_POST['post_text']);

    $req = $db->prepare('INSERT INTO post (account_id, title, content) VALUES (:account_id, :title, :content)');
    $req->bindParam('account_id', $_SESSION['account_id']);
    $req->bindParam('title', $title);
    $req->bindParam('content', $answer);
    $req->execute();
}


header("Location: ../forum.php");
exit();
?>
