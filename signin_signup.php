<?php
require_once("header.php");
?>

<div class="row mx-auto my-auto justify-content-between">
    <div class="col-md-5 card darkblue">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 white">
                    <h4>Connexion</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action='script/s_signin.php' method='post'>
                        <div class="form-group row white">
                        <label for="userName" class="col-4 col-form-label">Nom d'utilisateur*</label> 
                        <div class="col-8 white">
                            <input id="userName" name="userName" placeholder="Nom d'utilisateur" class="form-control here lightblue" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <label for="password" class="col-4 col-form-label">Mot de passe*</label> 
                        <div class="col-8 white">
                            <input id="password" name="password" placeholder="Mot de passe" class="form-control here lightblue" required="required" type="password">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary purple">Connexion</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 card darkblue">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 white">
                    <h4>Inscription</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action='script/s_signup.php' method='post'>
                        <div class="form-group row white">
                        <label for="userName" class="col-4 col-form-label">Nom d'utilisateur*</label> 
                        <div class="col-8 white">
                            <input id="userName" name="userName" placeholder="Nom d'utilisateur" class="form-control here lightblue" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <label for="email" class="col-4 col-form-label">Email*</label> 
                        <div class="col-8 white">
                            <input id="email" name="email" placeholder="Email" class="form-control here lightblue" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <label for="password" class="col-4 col-form-label">Mot de passe*</label> 
                        <div class="col-8 white">
                            <input id="password" name="password" placeholder="Mot de passe" class="form-control here lightblue" required="required" type="password">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <label for="password" class="col-4 col-form-label">Confirmation mot de passe*</label> 
                        <div class="col-8 white">
                            <input id="password" name="password" placeholder="Confirmer le mot de passe" class="form-control here lightblue" required="required" type="password">
                        </div>
                        </div>
                        <div class="form-group row white">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary purple">S'inscrire</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once("footer.php");
?>