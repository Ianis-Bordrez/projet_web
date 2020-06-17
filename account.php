<?php
require_once("header.php");

isNotConnectedRedirect();

$req = $db->prepare('SELECT * FROM account where account_id=:id');
$req->bindParam('id', $_SESSION['account_id']);
$req->execute();
$acc_info = $req->fetch();
?>

<section>
<article>
    <div class='card bg-darkblue txt-white'>
        <h5 class='card-header'>Informations du joueur</h5>
        <div class='card-body'>
            <div class='row'>
                <div class='col'>
                    <?php if (isset($acc_info['username'])) {
                        ?>
                        <h5 class='card-title'>Nom d'utilisateur</h5>
                        <p class='card-text'> <?php echo $acc_info['username']?> </p>
                        <?php
                    }
                    ?>
                </div>
                <div class='col'>
                    <?php if (isset($acc_info['email'])) {
                        ?>
                        <h5 class='card-title'>Email</h5>
                        <p class='card-text'> <?php echo $acc_info['email']?> </p>
                        <?php
                    }
                    ?>
                </div>
                <div class='col'>
                    <?php if (isset($acc_info['phone'])) {
                        ?>
                        <h5 class='card-title'>Téléphone</h5>
                        <p class='card-text'> <?php echo $acc_info['phone']?> </p>
                        <?php
                    }
                    ?>
                </div>
                <div class='col'>
                    <?php if (isset($acc_info['creation_date'])) {
                        ?>
                        <h5 class='card-title'>Date de création</h5>
                        <p class='card-text'> <?php echo $acc_info['creation_date']?> </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class='col mt-10'>
                    <?php if (isset($acc_info['description'])) {
                        ?>
                        <h5 class='card-title'>Description</h5>
                        <p class='card-text'><?php echo $acc_info['description']?> </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class='col text-center'>
                    <a href= "edit_account.php">
                        <button type="button" class="btn btn-primary bg-purple">Modifier vos informations</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>
</section>

<?php
require_once("footer.php");
?>