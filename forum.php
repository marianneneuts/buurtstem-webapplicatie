<?php include_once('logged_in.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Forum</title>
    <link rel="stylesheet" href="css/forum.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>

    <div class="content">
        <h2>Het forum</h2>

        <!-- topic toevoegen -->
        <div class="topic">
            <p>Voeg een nieuw topic toe!</p>
            <a href="#" class="add"><i class="fas fa-plus" style="color: #C78743;"></i></a>
        </div>
    </div>
</body>
</html>