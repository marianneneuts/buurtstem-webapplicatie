<?php include_once('logged_in.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Groups</title>
    <link rel="stylesheet" href="css/groups.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    
    <div class="content">
        <h2>Mijn groepen</h2>

        <div class="list"></div>

        <div class="group-1">
            <h3>Voetballen op de vesten</h3>
            <a href="">Groep bekijken</a>
            <br>
            <a href="">
            <button>Naar bord</button>
            </a>
        </div>

        <div class="group-2">
            <h3>Boekenclub</h3>
            <a href="">Groep bekijken</a>
            <br>
            <a href="">
            <button>Naar bord</button>
            </a>
        </div>
        </div>
    </div>
</body>
</html>