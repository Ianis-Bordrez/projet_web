<?php 
require_once('config.php');

// var_dump($GLOBALS);

if(empty($_POST['answer']) || empty($_POST['pid'])){
    header('Location: ../forum.php');
    exit();
}

if (isConnected()) {
    $answer = htmlspecialchars($_POST['answer']);
    $pid = htmlspecialchars($_POST['pid']);

    $req = $db->prepare('INSERT INTO answer (post_id, account_id, content) VALUES (:pid, :account_id, :content)');
    $req->bindParam('pid', $pid);
    $req->bindParam('account_id', $_SESSION['account_id']);
    $req->bindParam('content', $answer);
    $req->execute();
}


if ($pid){
    header("Location: ../post.php?pid=$pid");
} else {
    header("Location: ../forum.php");
}
exit();
?>
