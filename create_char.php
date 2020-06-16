<?php
require_once("header.php");
?>
<script src="js/create_char.js"></script>

<section class="d-flex justify-content-center">
    
    <div id = "character">


        <div class='card darkblue white'>
            <h5 class='card-header'>Créez votre personnage</h5>
            <div class='card-body'>
                <div class="row row-cols-3">
                    <div class="col">


                            <button type="button" name="prev_char" id="prev_char" class="btn prev_char">Précédent</button>
                    </div>
                    
                    <div class="col">
                        <img id="current_char_img" src="img/char/char_m_ninja.png">
                    </div>
                    
                    <div class="col">
                        <button type="button" name="next_char" id="next_char" class="btn next_char">Suivant</button>
                    </div>

                </div>



                <div class="row row-cols-3">
                    <div class="col">
                        <button type="button" name="male_char" id="male_char" class="btn male_char">Homme</button>
                    </div>
                    <div class="col-4">
                        <div class="form-group white">
                            <label for="pseudo" class=col-form-label">Pseudo*</label> 
                            <div class="white">
                                <input id="pseudo" name="pseudo" placeholder="Pseudo" class="form-control here lightblue" required="required" type="text">
                            </div>
                    
                        </div>
                        
                    </div>
                    <div class="col">
                        <button type="button" name="female_char" id="female_char" class="btn female_char">Femme</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>  
        
        

        



</section>

<?php
require_once("footer.php");
?>