<?php
    require "includes/bootstrap.php";

    unset($_SESSION["logged_user"]);
    header('Location: /');
?>