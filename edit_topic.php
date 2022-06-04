<?php
    include_once('logged_in.inc.php');
    include_once('core/autoload.php');

    $topicId = $_GET['topic'];

    if(isset($_POST['bijwerken'])) {
        $topic = new Topic();
        $topic->updateTopic($_POST['title'], $_POST['description'], $topicId);
        header("Location: topic.php?topic=$topicId");
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Edit topic</title>
    <link rel="stylesheet" href="css/add_topic.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>
    
    <div class="content">
        <div class="back">
            <a href="topic.php?topic=<?php echo $_GET["topic"]; ?>" class="back"><i class="fas fa-arrow-left" style="color: #C78743;"></i></a>
        </div>

        <br>

        <h2>Topic bijwerken</h2>

        <br>

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
                <textarea rows="4" cols="50" id="omschrijving" name="description" placeholder="Omschrijving van je idee"></textarea>
            </div>

            <!-- btn -->
            <div class="form__field">
                <input type="submit" name="bijwerken" value="Bijwerken" class="btn-bijwerken">
            </div>
        </form>
    </div>
</body>
</html>