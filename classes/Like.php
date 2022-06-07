<?php
    include_once(__DIR__ . "/Db.php");

    class Like {
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

        public static function saveLike($topicId, $userId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into likes (topicId, userId) values (:topicId, :userId)");
            $statement->bindValue(":topicId", $topicId);
            $statement->bindValue(":userId", $userId);
            return $statement->execute();
        }

        public static function CountLikes($topicId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select count(id) as total from likes WHERE topicId = :topicId");
            $statement->bindValue(":topicId", $topicId);
            $statement->execute();
            $count = $statement->fetch();
            return $count['total'];
        }

        public static function removeLike($topicId, $userId) {
                $conn = Db::getInstance();
                $statement = $conn->prepare("delete from likes where topicId = :topicId and userId = :userId");
                $statement->bindValue(":topicId", $topicId);
                $statement->bindValue(":userId", $userId);
                return $statement->execute();
        }

        public static function isLiked($topicId, $userId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from likes where topicId = :topicId and userId = :userId");
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