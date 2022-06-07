<?php
    include_once('logged_in.inc.php');
    include_once('core/autoload.php');

    if(isset($_SESSION['email'])) {
        $user = User::getUserByEmail($_SESSION['email']);
    }

    $topicId = $_GET['topic'];
    $topic = Topic::getTopicById($topicId);

    $totalLikes = Like::CountLikes($_GET['topic']);
    $totalDislikes = Dislike::CountDislikes($_GET['topic']);

    $comments = Comment::getAll($_GET['topic']);

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

                <?php if($user['id'] === $topic['userId']): ?>
                    <a href="delete_topic.php?topic=<?php echo $_GET["topic"]; ?>" class="delete"><i class="fa fa-trash" style="color: #C78743;"></i></a>
                <?php endif; ?>
            </div>

            <br>

            <div class="header">
                <h2><?php echo htmlspecialchars($topic['title']); ?></h2>

                <?php if($user['id'] === $topic['userId']): ?>
                    <a href="edit_topic.php?topic=<?php echo $topic['id']; ?>" class="edit"><i class="fa fa-edit" style="color: #C78743;"></i></a>
                <?php endif; ?>
            </div>
            
            <br>
            <p><?php echo htmlspecialchars($topic['description']); ?></p>
            <br>
            <p class="date" style="opacity: 0.5">Geplaatst op: <?php echo htmlspecialchars($topic['date']); ?></p>

            <br>

            <div class="actions">
                <a href="" class="postAction <?php if(Like::isLiked($_GET['topic'], $user['id'])){ echo 'liked'; } ?>" id="like" data-id="<?php echo $topic['id'] ?>" data-user="<?php echo $topic['userId'] ?>"><?php echo $totalLikes; ?> <i class="fa fa-thumbs-up" style="color: #C78743;"></i></a>
                <a href="" class="postAction <?php if(Dislike::isDisliked($_GET['topic'], $user['id'])){ echo 'disliked'; } ?>" id="dislike" data-id="<?php echo $topic['id'] ?>" data-user="<?php echo $topic['userId'] ?>"><?php echo $totalDislikes; ?> <i class="fa fa-thumbs-down" style="color: #C78743;"></i></a>
            </div>

            <br>

            <div class="commentSection">
                <div class="commentForm">
                    <input type="text" id="commentText" placeholder="Laat een reactie achter">
                    <a href="#" class="submitComment" data-topicid="<?php echo $topic['id'] ?>">Reactie plaatsen</a>
                </div>

                <br>

                <ul class="CommentList">
                    <?php foreach($comments as $comment): ?>
                        <?php $commentUser = User::getUserById($comment['userId']) ?>
                            <li>
                                <div>
                                    <?php if($user['id'] === $topic['userId']): ?>
                                        <h4 class="detailsText"><?php echo $commentUser['firstname'] ?> reageerde:</h4>
                                    <?php else: ?>
                                        <h4 class="detailsText">Anoniem reageerde:</h4>
                                    <?php endif; ?>

                                    <p><?php echo $comment['text'] ?></p>
                                </div>
                            </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="js/like.js"></script>
    <script src="js/dislike.js"></script>
    <script src="js/comment.js"></script>
</body>
</html>