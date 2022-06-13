<?php
    include_once('bootstrap.php');
    
    Topic::deleteTopic($_GET["topic"]);
    header("Location: forum.php");
?>