<?php
require_once('header.php');

isNotConnectedRedirect();

?>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/chat.js"></script>

<div class="container">
    <br/>

    <h3 align="center" class="txt-white">Chat</a></h3><br />
    
    <div class="table-responsive">
        <h4 align="center" class="txt-white">Liste des utilisateurs</h4>
        <br>
        <div id="user_details"></div>
        <div id="user_model_details"></div>
    </div>
</div>

<?php
require_once('footer.php');
?>