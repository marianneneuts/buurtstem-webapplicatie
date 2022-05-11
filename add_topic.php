<?php include_once('logged_in.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Add topic</title>
    <link rel="stylesheet" href="css/add_topic.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    
    <div class="content">
        <h2>Laat hier je topic achter!</h2>

        <form action="" method="post">
            <!-- titel -->
            <div class="form__field">
                <input type="text" id="titel" name="title" placeholder="Titel">
            </div>

            <!-- omschrijving -->
            <div class="form__field">
                <input type="text" id="omschrijving" name="description" placeholder="Omschrijving">
            </div>

            <!-- btn -->
            <div class="form__field">
                <input type="submit" name="toevoegen" value="Toevoegen" class="btn-toevoegen">
            </div>
        </form>
    </div>
</body>
</html>