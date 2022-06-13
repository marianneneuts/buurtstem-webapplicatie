<?php
    require_once('../bootstrap.php');
    session_start();

    if(!empty($_POST)) {
        $userId = User::getUserByEmail($_SESSION['email'])['id'];
        if(Like::isLiked($_POST['topicId'], $userId) === false) {
            Like::saveLike($_POST['topicId'], $userId);
            $total = Like::CountLikes($_POST['topicId']);
            
            $response = [
                "status" => "succes",
                "message" => "Like was successful",
                "totallikes" => $total
            ];
            
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        else {
            Like::removeLike($_POST['topicId'], $userId);
            $total = Like::CountLikes($_POST['topicId']);
            
            $response = [
                "status" => "succes",
                "message" => "Unlike was successful",
                "totallikes" => $total
            ];
            
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }