<?php
require_once("header.php");
?>

<div class="row mx-auto my-auto justify-content-around">
    <div class="col-md-5 card bg-darkblue">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 txt-white">
                    <h4>Connexion</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action='script/s_signin.php' method='post'>
                        <div class="form-group row">
                        <label for="userName" class="col-4 col-form-label txt-white">Nom d'utilisateur*</label> 
                        <div class="col-8">
                            <input id="userName" name="userName" placeholder="Nom d'utilisateur" class="form-control here bg-lightblue txt-white" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-4 col-form-label txt-white">Mot de passe*</label> 
                        <div class="col-8 txt-white">
                            <input id="password" name="password" placeholder="Mot de passe" class="form-control here bg-lightblue txt-white" required="required" type="password">
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary bg-purple txt-white">Connexion</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 card bg-darkblue">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 txt-white">
                    <h4>Inscription</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action='script/s_signup.php' method='post'>
                        <div class="form-group row">
                        <label for="userName" class="col-4 col-form-label txt-white">Nom d'utilisateur*</label> 
                        <div class="col-8">
                            <input id="userName" name="userName" placeholder="Nom d'utilisateur" class="form-control here bg-lightblue txt-white" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-4 col-form-label txt-white">Email*</label> 
                        <div class="col-8">
                            <input id="email" name="email" placeholder="Email" class="form-control here bg-lightblue txt-white" required="required" type="text">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-4 col-form-label txt-white">Mot de passe*</label> 
                        <div class="col-8">
                            <input id="password" name="password" placeholder="Mot de passe" class="form-control here bg-lightblue txt-white" required="required" type="password">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-4 col-form-label txt-white">Confirmation mot de passe*</label> 
                        <div class="col-8 txt-white">
                            <input id="password" name="password" placeholder="Confirmer le mot de passe" class="form-control here bg-lightblue txt-white" required="required" type="password">
                        </div>
                        </div>
                        <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary bg-purple txt-white">S'inscrire</button>
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