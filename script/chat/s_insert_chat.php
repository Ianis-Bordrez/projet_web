<?php
require_once('../config.php');

$rid = htmlspecialchars($_POST['receiver_id']);
$message = htmlspecialchars($_POST['message']);

$req = $db->prepare("INSERT INTO private_message (sender_id, receiver_id, message, status) VALUES (:sender_id, :receiver_id, :message, 1)");
$req->bindParam('sender_id', $_SESSION['account_id']);
$req->bindParam('receiver_id', $rid);
$req->bindParam('message', $message);
$req->execute();

if($req) {
    echo fetch_user_chat_history($_SESSION['account_id'], htmlspecialchars($_POST['receiver_id']), $db);
}

?>