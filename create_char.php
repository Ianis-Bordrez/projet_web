<?php
require_once("header.php");
?>
<script src="js/create_char.js"></script>

<section>

<button type="button" name="prev_char" id="prev_char" class="btn prev_char">Précédent</button>

<img id="current_char_img" src="img/char/char_m_0.png">
<button type="button" name="next_char" id="next_char" class="btn next_char">Suivant</button>

<br>
<button type="button" name="male_char" id="male_char" class="btn male_char">Homme</button>
<button type="button" name="female_char" id="female_char" class="btn female_char">Femme</button>
<br>
<br>


<div class="form-group white">
    <label for="pseudo" class="col-4 col-form-label">Pseudo*</label> 
    <div class="col-2 white">
        <input id="pseudo" name="pseudo" placeholder="Pseudo" class="form-control here lightblue" required="required" type="text">
    </div>
</div>

<button type="button" name="create_char" id="create_char" class="btn create_char">Créer</button>


</section>

<?php
require_once("footer.php");
?>