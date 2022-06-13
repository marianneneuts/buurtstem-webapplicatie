<?php
    include_once('logged_in.inc.php');
    include_once('bootstrap.php');

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
            $topic->setDate(date("Y-m-d"));
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
    <title>Buurtstem - Topic toevoegen</title>
    <link rel="stylesheet" href="css/add_topic.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    
    <div class="content">
        <div class="back">
            <a href="forum.php" class="back"><i class="fas fa-arrow-left" style="color: #C78743;"></i></a>
        </div>

        <br>

        <h2>Laat hier je topic achter!</h2>

        <br>

        <form action="" method="post">
            <!-- errors -->
            <?php if(isset($error)): ?>
                <div class="form-error">
                    <p><strong>Opgepast:</strong></p>
                    <?php if(isset($error)) { echo $error; }?>
                </div>
                <br>
            <?php endif; ?>

            <!-- titel -->
            <div class="form__field">
                <input type="text" id="titel" name="title" placeholder="Titel">
            </div>

            <!-- omschrijving -->
            <div class="form__field">
                <textarea rows="4" cols="50" id="omschrijving" name="description" placeholder="Omschrijving van je idee"></textarea>
            </div>

            <!-- btn -->
            <div class="form__field">
                <input type="submit" name="toevoegen" value="Toevoegen" class="btn-toevoegen">

                <a href="forum.php" class="annuleren">Annuleren</a>
            </div>
        </form>
    </div>
</body>
</html>