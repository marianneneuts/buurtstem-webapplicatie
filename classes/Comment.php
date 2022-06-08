<?php
    include_once(__DIR__ . "/Db.php");

    class Comment {
        private $commentId;
        private $text;
        private $topicId;
        private $userId;

        // id
        public function getCommentId() {
            return $this->commentId;
        }

        public function setCommentId($commentId) {
            $this->commentId = $commentId;
            return $this;
        }

        // text
        public function getText() {
            return $this->text;
        }

        public function setText($text) {
            $this->text = $text;
            return $this;
        }

        // topicId
        public function getTopicId() {
            return $this->topicId;
        }

        public function setTopicId($topicId) {
            $this->topicId = $topicId;
            return $this;
        }

        // userId
        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
            return $this;
        }

        // add a comment to database
        public function save() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into comments (text, topicId, userId) values (:text, :topicId, :userId)");

            $text = $this->getText();
            $topicId = $this->getTopicId();
            $userId = $this->getUserId();

            $statement->bindValue(':text', $text);
            $statement->bindValue(':topicId', $topicId);
            $statement->bindValue(':userId', $userId);

            $statement->execute();
            return $conn->lastInsertId();
        }

        // get all comment information
        public static function getAll($topicId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from comments where topicId = :topicId");
            $statement->bindValue(':topicId', $topicId);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        // count comments
        public static function countComments($topicId) {
            $conn = DB::getInstance();
            $query = $conn->prepare("select count(id) from comments where topicId = :topicId");
            $query->bindValue(":topicId", $topicId);
            $query->execute();
            $comments = intval($query->fetchColumn());
            return($comments);
        }
    }