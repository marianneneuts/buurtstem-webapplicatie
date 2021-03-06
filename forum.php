<?php
    include_once('logged_in.inc.php');
    include_once('bootstrap.php');

    $topics = Topic::getAll();

    if(isset($_POST['search']) && !empty($_POST['searchbalk'])) {
        $search = $_POST['searchbalk'];
        $searched_topic = Topic::getTopicbyTitle($search);
        $id = $searched_topic['id'];
        header("Location: topic.php?topic=".$id);
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtstem - Forum</title>
    <link rel="stylesheet" href="css/forum.css?v=<?php echo time(); ?>">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <?php include_once("nav.inc.php"); ?>

    <div class="content">
        <h2>Het forum</h2>

        <br>

        <!-- topic toevoegen -->
        <div class="topic">
            <a href="add_topic.php" class="add">Voeg een nieuw topic toe! <i class="fas fa-plus" style="color: #C78743;"></i></a>
        </div>

        <!-- tabel -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titel</th>
                    <th scope="col">Bekeken</th>
                    <th scope="col">Aantal reacties</th>
                    <th scope="col">Geplaatst op</th>
                </tr>
            </thead>

            <?php if(!empty($topics)): ?>
                <?php foreach($topics as $topic): ?>
                <?php $countComments = Comment::countComments($topic['id']); ?>
                    <tbody>
                        <tr>
                            <td style="text-decoration: underline"><a href="topic.php?topic=<?php echo $topic["id"]; ?>" class="btn btn-info"><?php echo htmlspecialchars($topic['title']); ?></a></td>
                            <td>0</td>
                            <td><?php echo $countComments ?></td>
                            <td><?php echo htmlspecialchars($topic['date']); ?></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if(empty($topics)): ?>
                <tbody>
                    <tr>
                        <td>N.v.t.</td>
                        <td>0</td>
                        <td>0</td>
                        <td>Y-m-d</td>
                    </tr>
                </tbody>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>