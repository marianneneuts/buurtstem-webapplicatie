<?php 
    require_once('../bootstrap.php');
    session_start();

    if(!empty($_POST)){
        $c = new Comment();
        $c->setTopicId($_POST['topicId']);
        $c->setText($_POST['text']);
        $user = User::getUserByEmail($_SESSION['email']);
        $firstname = $user['firstname'];
        $c->setUserId($user['id']);
        $id = $c->save();

        $response = [
            'status' => 'succes',
            'body' => htmlspecialchars($c->getText()),
            'firstname' => htmlspecialchars($firstname),
            'id' => $id,
            'message' => 'Comment saved'
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    };
?>