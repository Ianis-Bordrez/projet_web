<?php
require_once('script/config.php');

if(!isConnected()) {
 header('location: signin_signup.php');
}
?>

<html>  
    <head>  
        <title>Chat Application using PHP Ajax Jquery</title>  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
            <br />
    
            <h3 align="center">Chat Application using PHP Ajax Jquery</a></h3><br />
            <br />
            
            <div class="table-responsive">
                <h4 align="center">Online User</h4>
                <p align="right">Hi - <?php echo $_SESSION['username']; ?> - <a href="script/s_signout.php">Logout</a></p>
                <div id="user_details"></div>
                <div id="user_model_details"></div>
            </div>
        </div>

        <script src="js/chat.js"></script>
    </body>
</html>