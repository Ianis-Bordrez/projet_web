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
<article>
    <div class="card darkblue">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 white">
                    <h4>Mettre à jour vos informations</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <div class="form-group row white">
                        <label for="username" class="col-4 col-form-label">Nom d'utilisateur*</label> 
                        <div class="col-8 white">
                            <input id="username" name="username" placeholder="Nom d'utilisateur" class="form-control here lightblue" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <label for="email" class="col-4 col-form-label">Email*</label> 
                        <div class="col-8 white">
                            <input id="email" name="email" placeholder="Email" class="form-control here lightblue" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <label for="description" class="col-4 col-form-label">Description</label> 
                        <div class="col-8 white">
                            <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control lightblue"></textarea>
                        </div>
                        </div>  
                        <div class="form-group row white">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary purple">Mettre à jour</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</article>
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
                
            </div>
        </div>
    </article>
    <?php
}?>

<?php
require_once("footer.php");
var_dump($_SESSION);
var_dump($acc_info);
?>