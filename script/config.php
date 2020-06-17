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

function isNotConnectedRedirect($page = "signin_signup.php") {
    /**
     * Fonction de bidouillage pour corriger le warning : Cannot modify header information - headers already sent by
     * 
     * Permet de rediriger l'utilisateur non connecté sur une autre page passé en paramètre après que le headers soit créé.
     * 
    */
    if (!isConnected()) {
        redirect($page);
    }
}

function redirect($page) {
    echo "<script type='text/JavaScript'>
    location.replace('$page'); 
    </script>
    ";
    exit();
}

function fetch_user_chat_history($sender_id, $receiver_id, $db) {
    $req = $db->prepare("SELECT * FROM private_message WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id) ORDER BY message_date ASC");
    $req->bindParam("sender_id", $sender_id);
    $req->bindParam("receiver_id", $receiver_id);
    $req->execute();
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