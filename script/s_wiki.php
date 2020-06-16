<?php
var_dump($GLOBALS);
$req = $db->prepare("SELECT * FROM account WHERE account_id != :account_id ");
$req->bindParam('account_id', $_SESSION['account_id']);
$req->execute();
$results = $req->fetchAll();
$req->closeCursor();
?>