<?php 
require_once('config.php');

if(empty($_POST['userName']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['phone'])){
    header('Location: ../signin_signup.php');
    exit();
}

if (!isConnected()) {
    $username = htmlspecialchars($_POST['userName']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    $req = $db->prepare('SELECT username FROM account WHERE username = :username');
    $req->bindParam('username', $username);
    $req->execute();
    $username_exist = $req->fetch();

    if ($username_exist){
        echo "Un utilisateur porte déjà  ce nom";
        header("Location: ../signin_signup.php");
        exit();
    }

    $pass_hash = password_hash($password, PASSWORD_DEFAULT);

    $req = $db->prepare('INSERT INTO account (username, password, email, phone) VALUES (:username, :password, :email, :phone)');

    $req->bindParam('username', $username);
    $req->bindParam('password', $pass_hash);
    $req->bindParam('email', $email);
    $req->bindParam('phone', $phone);

    $req->execute();
}

header('Location: ../signin_signup.php');
exit();
?>