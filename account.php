<?php



require_once("script/config.php");
if (!isConnected()){
    header('Location: signin_signup.php');
}
require_once("header.php");

$pid = $_SESSION['account_id'];
$req = $db->prepare('SELECT * FROM account where account_id=:id');
$req->execute(array("id"=> $pid));
$acc_info = $req->fetch();

?>

<?php if (isConnected()) {
    ?>
    <article>
        <div class='card darkblue white'>
            <h5 class='card-header'>Informations du joueur</h5>
            <div class='card-body'>
                <div class='row'>
                    <div class='col'>
                        <h5 class='card-title'>Nom d'utilisateur</h5>
                        <p class='card-text'> <?php echo $acc_info['username']?> </p>
                    </div>
                    <div class='col'>
                        <h5 class='card-title'>Email</h5>
                        <p class='card-text'> <?php echo $acc_info['email']?> </p>
                    </div>
                    <div class='col'>
                        <h5 class='card-title'>Phone</h5>
                        <p class='card-text'> <?php echo $acc_info['phone']?> </p>
                    </div>
                    <div class='col'>
                        <h5 class='card-title'>Date de création</h5>
                        <p class='card-text'> <?php echo $acc_info['creation_date']?> </p>
                    </div>
                </div>
                <div class="row"></div>
                    <div class='col mt-10'>
                        <h5 class='card-title'>Description</h5>
                        <p class='card-text'><?php echo $acc_info['description']?> </p>
                    </div>
                </div>
                <div class="row"></div>
                    <div class='col text-center'>
                        <a href= "edit_account.php">
                            <button type="button" class="btn btn-primary purple">Modifier vos informations</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <?php
}?>

<?php
require_once("footer.php");
?>