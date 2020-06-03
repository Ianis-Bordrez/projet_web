<?php

session_start();

$database_host = 'localhost';
$database_port = '3306';
$database_dbname = 'ynovprojetweb_2020';
$database_user = 'root';
$database_password = '';
$database_charset = 'UTF8';
$database_options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
	$db = new PDO(
        'mysql:host=' . $database_host .
        ';port=' . $database_port .
        ';dbname=' . $database_dbname .
        ';charset=' . $database_charset,
        $database_user,
        $database_password,
        $database_options
    );
}
catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
}


function isConnected() {
    if (isset($_SESSION['account_id'])) {
        return True;
    }
    return False;
}

function fetch_user_last_activity($user_id, $db) {
    $req = $db->prepare("SELECT account_id, last_activity FROM account WHERE account_id = :account_id ORDER BY last_activity DESC LIMIT 1");
    $req->execute(array("account_id"=> $user_id));
    $result = $req->fetchAll();
    foreach($result as $row) {
    return $row['last_activity'];
    }
}

function fetch_user_chat_history($sender_id, $receiver_id, $db) {
    $req = $db->prepare("SELECT * FROM private_message WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id) ORDER BY message_date ASC");
    $req->execute(array(
        "sender_id" => $sender_id,
        "receiver_id" => $receiver_id,
    ));
    $result = $req->fetchAll();

    $output = '<ul class="list-unstyled">';

    foreach($result as $row) {
        $user_name = '';
        if($row["sender_id"] == $sender_id) {
            $user_name = '<b class="text-success">You</b>';
        } else {
            $user_name = '<b class="text-danger">'.get_user_name($row['sender_id'], $db).'</b>';
        }
        $output .= '
            <li style="border-bottom:1px dotted #ccc">
            <p>'.$user_name.' - '.$row["message"].'
            <div align="right">
                - <small><em>'.$row['message_date'].'</em></small>
            </div>
            </p>
            </li>
        ';
    }
    $output .= '</ul>';

    return $output;
}

function get_user_name($user_id, $db) {
    $req = $db->prepare("SELECT username FROM account WHERE account_id = :user_id");
    $req->execute(array("user_id"=> $user_id));
    $result = $req->fetch();
    if ($result) {
        return $result['username'];
    }
    return "Utilisateur introuvable";
}

?>