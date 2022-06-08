<?php
    include_once(__DIR__ . "/Db.php");

    class Dislike {
        private $topicId;
        private $userId;

        // topic id
        public function getTopicId() {
            return $this->topicId;
        }

        public function setTopicId($topicId) {
            $this->topicId = $topicId;
            return $this;
        }

        // user id
        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
            return $this;
        }

        // add a dislike to database
        public static function saveDislike($topicId, $userId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into dislikes (topicId, userId) values (:topicId, :userId)");
            $statement->bindValue(":topicId", $topicId);
            $statement->bindValue(":userId", $userId);
            return $statement->execute();
        }

        // count dislikes
        public static function CountDislikes($topicId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select count(id) as total from dislikes where topicId = :topicId");
            $statement->bindValue(":topicId", $topicId);
            $statement->execute();
            $count = $statement->fetch();
            return $count['total'];
        }

        // remove a dislike
        public static function removeDislike($topicId, $userId) {
                $conn = Db::getInstance();
                $statement = $conn->prepare("delete from dislikes where topicId = :topicId and userId = :userId");
                $statement->bindValue(":topicId", $topicId);
                $statement->bindValue(":userId", $userId);
                return $statement->execute();
        }

        public static function isDisliked($topicId, $userId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from dislikes where topicId = :topicId and userId = :userId");
            $statement->bindValue(":topicId", $topicId);
            $statement->bindValue(":userId", $userId);
            $statement->execute();
            $count = $statement->fetch();
            if(!empty($count)) {
                return true;
            }
            return false;
        }
    }