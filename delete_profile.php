<?php
    include_once('bootstrap.php');
    session_start();
    session_destroy();

    User::deleteProfile();
    header("Location: signup.php");
?>