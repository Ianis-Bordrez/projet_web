<?php
require_once("header.php");
?>

<div class='col'>
    <div class='card' style='width: 100%;'>
        <div class='card-header'>
            Compte
        </div>
        <div class='card-body'>
            <ul class='list-group list-group-flush list-unstyled'>
                <li class='list-group-item'><h5 class='card-title'>Informations sur votre compte</h5></li>
                <li><div class="row">
                    <label class="col-sm-2 col-form-label">Nom d'utilisateur</label>
                    <div class="col-sm-10">
                        <p>Utilisateur<p>
                    </div>
                </div></li>
                <li><div class="row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <p>email@email.fr<p>
                    </div>
                </div></li>
                <li><div class="row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <p>Votre description<p>
                    </div>
                </div></li>
            </ul>
        </div>
    </div>
</div>


<?php
require_once("footer.php");
?>