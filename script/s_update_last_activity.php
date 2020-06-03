<?php
include('config.php');

$req = $db->prepare("UPDATE account SET last_activity = now() WHERE account_id = :account_id");
$req->bindParam('account_id', $_SESSION["account_id"]);
$req->execute();

?>