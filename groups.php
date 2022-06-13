<?php include_once('logged_in.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Groepen</title>
    <link rel="stylesheet" href="css/groups.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    
    <div class="content">
        <h2>Mijn groepen</h2>

        <div class="card">
            <h2>Openluchtfitnesstoestellen</h2>
            <br>
            <a href="group_details.php" style="text-decoration: underline; opacity: 0.5;"><h3>Groepsdeelnemers bekijken</h3></a>

            <a href="https://miro.com/nl/" target="_blank">
                <button>Naar bord</button>
            </a>
        </div>
    </div>
</body>
</html>