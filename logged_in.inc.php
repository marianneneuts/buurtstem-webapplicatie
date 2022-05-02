<!-- prevent a user who is not logged in from entering the forum -->

<?php
    session_start();
    if(!$_SESSION["loggedIn"]) {
        header("Location: login.php");
    }
?>