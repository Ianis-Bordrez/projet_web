<?php
require_once("config.php");

if(!isset($_POST["email"])) {
    redirect("../index.php");
}

$req = $db->prepare('SELECT account_id, email FROM account WHERE email = :email');
$req->bindParam('email', $_POST["email"]);
$req->execute();
$acc_info = $req->fetch();
$req->closeCursor();

if(!$acc_info) {
    redirect("../index.php");
}

$chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
srand((double)microtime()*1000000);
$password = '';
for($i=0; $i<8; $i++){
    $password .= $chaine[rand()%strlen($chaine)];
}

$dest = $acc_info["email"];
$sujet = "Nouveau mot de passe";
$corp = "Bonjour, votre nouveau mot de passe est : $password";
$headers = "De : ynovprojetweb@alwaysdata.net";
mail($dest, $sujet, $corp, $headers);

$pass_hash = password_hash($password, PASSWORD_DEFAULT);

$req = $db->prepare('UPDATE account SET password=:password WHERE email=:email');
$req->bindParam("password", $pass_hash);
$req->bindParam("email", $acc_info["email"]);
$req->execute();
$req->closeCursor();

redirect("../signin_signup.php");

?>