<?php
    require "includes/bootstrap.php";

    if (isset($_SESSION["en"])) {
        unset($_SESSION["en"]);
    } else {
        $_SESSION["en"] = true;
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
?>