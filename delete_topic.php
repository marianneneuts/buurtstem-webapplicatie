<?php
    include_once('core/autoload.php');
    
    Topic::deleteTopic($_GET["topic"]);
    header("Location: forum.php");
?>