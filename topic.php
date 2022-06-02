<?php
    include_once('logged_in.inc.php');
    include_once('core/autoload.php');

    $topicId = $_GET['topic'];
    $topic = Topic::getTopicById($topicId);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Topic</title>
    <link rel="stylesheet" href="css/topic.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>

    <div class="content">
        <div class="card">
            <div class="back">
                <a href="forum.php" class="back"><i class="fas fa-arrow-left" style="color: #C78743;"></i></a>
            </div>

            <br>

            <h2><?php echo htmlspecialchars($topic['title']); ?></h2>
            <br>
            <p><?php echo htmlspecialchars($topic['description']); ?></p>
            <br>
            <p class="date" style="opacity: 0.5">Geplaatst op: <?php echo htmlspecialchars($topic['date']); ?></p>
        </div>
    </div>
</body>
</html>