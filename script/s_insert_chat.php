<?php

//insert_chat.php

require_once('config.php');

$req = $db->prepare("INSERT INTO private_message (sender_id, receiver_id, message, status) VALUES (:sender_id, :receiver_id, :message, :status)");
$req->bindParam('sender_id', $_SESSION['account_id']);
$req->bindParam('receiver_id', htmlspecialchars($_POST['receiver_id']));
$req->bindParam('message', htmlspecialchars($_POST['message']));
$req->bindParam('status', '1');
$req->execute();

if($req) {
    echo fetch_user_chat_history($_SESSION['account_id'], htmlspecialchars($_POST['receiver_id']), $db);
}

?>