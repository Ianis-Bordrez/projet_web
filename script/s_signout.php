<?php
require('../config.php');

if (isConnected()) {
    session_destroy();
    header('Location: ../index.php');
    exit();
}

?>