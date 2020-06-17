<?php

require_once('config.php');

if (isConnected()) {
    if (!empty($_POST['username'] || !empty($_POST['email']) || !empty($_POST['description']) )) {

        if (isset($_POST['pid'])){
            $pid = $_POST['pid'];
        } else {
            $pid = $_SESSION['account_id'];
        }

        $req = $db->prepare('UPDATE account SET username=:username, email=:email, description=:description WHERE account_id=:pid');
        $req->bindParam("username", $_POST['username']);
        $req->bindParam("email", $_POST['email']);
        $req->bindParam("description", $_POST['description']);
        $req->bindParam("pid", $pid);
        $req->execute();
    }
}

if (isset($_POST['pid'])){
    header("Location: ../edit_account.php");
} else {
    header("Location: ../account.php");
}

exit();
?>