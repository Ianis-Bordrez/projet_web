<?php
require_once("header.php");
?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h4>Information du compte</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group row">
                    <label for="username" class="col-4 col-form-label">Nom d'utilisateur*</label> 
                    <div class="col-8">
                        <input id="username" name="username" placeholder="Nom d'utilisateur" class="form-control here" required="required" type="text">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="email" class="col-4 col-form-label">Email*</label> 
                    <div class="col-8">
                        <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="description" class="col-4 col-form-label">Description</label> 
                    <div class="col-8">
                        <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control"></textarea>
                    </div>
                    </div>  
                    <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>


<?php
require_once("footer.php");
?>