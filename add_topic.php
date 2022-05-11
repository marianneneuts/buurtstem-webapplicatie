<?php include_once('logged_in.inc.php'); ?>
<?php include_once('core/autoload.php'); ?>

<?php
    if(!empty($_POST)) {
        try {
            $topic = new Topic();
            if(isset($_SESSION['userId'])) {
                $topic->setUserId($_SESSION['userId']);
            }
            else {
                $topic->setUserId(1);
            }
            $topic->setTitle($_POST["title"]);
            $topic->setDescription($_POST["description"]);
            $topic->add();

            header("Location: forum.php");
        }
        catch(Throwable $error) {
            $error = $error->getMessage();
        }
    }

?><!DOCTYPE html>
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
            <!-- errors -->
            <?php if(isset($error)): ?>
                <div class="form-error">
                    <p><strong>Opgepast:</strong></p>
                    <?php if(isset($error)) { echo $error; }?>
                </div>
            <?php endif; ?>

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