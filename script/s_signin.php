<?php
require_once('config.php');

if (!isConnected()) {
    $username = htmlspecialchars($_POST['userName']);
    $req = $db->prepare('SELECT account_id, username, password, status FROM account WHERE username = :username');
    $req->bindParam('username', $username);
    $req->execute();
    $acc_info = $req->fetch();

    if ($acc_info) {
        $isPasswordCorrect = password_verify(htmlspecialchars($_POST['password']), $acc_info['password']);
        if ($isPasswordCorrect) {
            $_SESSION['account_id'] = $acc_info['account_id'];
            $_SESSION['username'] = $acc_info['username'];
            $_SESSION['status'] = $acc_info['status'];
            header('Location: ../index.php');
            exit();
        }
    }
}
header("Location: ../signin_signup.php");
exit();
?>