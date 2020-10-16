<?php
require_once("header.php");
?>

<section>

<article>
    <div class='card bg-darkblue txt-white borderpost col-md-7'>
        <div class='card-body'>
            <form action='script/s_send_mail.php' method='post'>
                <div class="form-group row txt-white">
                    <label for="email" class="col-2 col-form-label">Mail*</label> 
                    <div class="col-5 txt-white">
                        <input id="email" name="email" class="form-control here bg-lightblue txt-white" required="required" type="email">
                    </div>
                </div>
                <div class="form-group row txt-white">
                    <div class="offset-2 col-9">
                        <button name="submit" type="submit" name='pid' class="btn btn-primary bg-purple">Générer un nouveau mot de passe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</article>

</section>

<?php
require_once("footer.php");
?>