<?php
    include_once(__DIR__ . "/Db.php");

    class Comment {
        private $commentId;
        private $text;
        private $topicId;
        private $userId;

        public function getCommentId() {
            return $this->commentId;
        }

        public function setCommentId($commentId) {
            $this->commentId = $commentId;
            return $this;
        }

        public function getText() {
            return $this->text;
        }

        public function setText($text) {
            $this->text = $text;
            return $this;
        }

        public function getTopicId() {
            return $this->topicId;
        }

        public function setTopicId($topicId) {
            $this->topicId = $topicId;
            return $this;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function setUserId($userId) {
            $this->userId = $userId;
            return $this;
        }

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

        public static function getAll($topicId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from comments where topicId = :topicId");
            $statement->bindValue(':topicId', $topicId);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }