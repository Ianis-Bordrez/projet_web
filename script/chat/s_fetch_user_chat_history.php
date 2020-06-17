<?php
require_once('../config.php');

echo fetch_user_chat_history($_SESSION['account_id'], $_POST['receiver_id'], $db);

?>