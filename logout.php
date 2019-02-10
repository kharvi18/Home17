<?php
    require('connect.php');
    unset($_SESSION['loggined']);
    session_destroy();
    header('Location: /');
?>