<?php
require_once("header.php");
?>

<div class="card darkblue">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 white">
                <h4>Information du compte</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
            </div>
        </div>
        
    </div>
</div>


<?php
require_once("footer.php");
?>