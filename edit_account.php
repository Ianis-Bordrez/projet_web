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
                    <form action='script/s_edit_account.php' method='post'>
                        <div class="form-group row white">
                        <label for="username" class="col-4 col-form-label">Nom d'utilisateur*</label> 
                        <div class="col-8 white">
                            <input id="username" name="username" value="<?php echo $acc_info['username']?>" class="form-control here lightblue" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <label for="email" class="col-4 col-form-label">Email*</label> 
                        <div class="col-8 white">
                            <input id="email" name="email" value="<?php echo $acc_info['email']?>" class="form-control here lightblue" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <label for="description" class="col-4 col-form-label">Description</label> 
                        <div class="col-8 white">
                            <textarea id="description" value="<?php echo $acc_info['description']?>" name="description" cols="40" rows="4" class="form-control lightblue"><?php echo $acc_info['description']?></textarea>
                        </div>
                        </div>  
                        <div class="form-group row white">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" name='pid' value='$pid' class="btn btn-primary purple">Mettre à jour</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</article>
</section>

<?php
require_once("footer.php");
?>