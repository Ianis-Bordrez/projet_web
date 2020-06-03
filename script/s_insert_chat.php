<?php

//insert_chat.php

require_once('config.php');

$req = $db->prepare("INSERT INTO private_message (sender_id, receiver_id, message, status) VALUES (:sender_id, :receiver_id, :message, :status)");
$req->execute(array(
    'sender_id'  => $_SESSION['account_id'],
    'receiver_id'  => $_POST['receiver_id'],
    'message'  => $_POST['message'],
    'status'   => '1'
));

if($req) {
    echo fetch_user_chat_history($_SESSION['account_id'], $_POST['receiver_id'], $db);
}

?>