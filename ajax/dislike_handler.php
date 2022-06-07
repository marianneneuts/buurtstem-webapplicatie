<?php
    require_once('../core/autoload.php');
    session_start();

    if(!empty($_POST)) {
        $userId = User::getUserByEmail($_SESSION['email'])['id'];
        if(Dislike::isDisliked($_POST['topicId'], $userId) === false) {
            Dislike::saveDislike($_POST['topicId'], $userId);
            $total = Dislike::CountDislikes($_POST['topicId']);
            
            $response = [
                "status" => "succes",
                "message" => "Dislike was successful",
                "totaldislikes" => $total
            ];
            
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        else {
            Dislike::removeDislike($_POST['topicId'], $userId);
            $total = Dislike::CountDislikes($_POST['topicId']);
            
            $response = [
                "status" => "succes",
                "message" => "Undislike was successful",
                "totaldislikes" => $total
            ];
            
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }