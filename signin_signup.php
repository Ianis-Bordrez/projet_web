<?php

echo "
    <div>
    <p>Connexion</p>
    <form action='script/s_signin.php' method='post'>
        <div>
            <label for='userName'>Nom d'utilisateur</label>
            <input id='userName' name='userName' type='text'>
        </div>
        <div>
            <label for='password'>Mot de passe</label>
            <input id='password' name='password' type='password'>
        </div>
        <button type='submit'>Se connecter</button>
    </form>
    </div>

    <div>
    <p>Inscription</p>
    <form action='script/s_signup.php' method='post'>
        <div>
            <label for='userName'>Nom d'utilisateur</label>
            <input id='userName' name='userName' type='text' class='validate'>
        </div>
        <div>
            <label for='password'>Mot de passe</label>
            <input id='password' name='password' type='password' class='validate'>
        </div>
        <div class='input-field col s6'>
            <label for='email'>Adresse Email</label>
            <input id='email' name='email' type='text' class='validate'>
        </div>
        <div class='input-field col s6'>
            <label for='phone'>Numéro de téléphone</label>
            <input id='phone' name='phone' type='tel' class='validate' maxlength='10'>
        </div>
        <button class='btn waves-effect waves-light' type='submit'>S'inscrire</button>
    </form>
    </div>
";

?>