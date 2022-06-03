<?php
    include_once(__DIR__ . "/Db.php");

    class Topic {
        private $topicId;
        private $userId;
        private $title;
        private $description;
        private $date;

        // topic id
        public function setTopicId($topicId) {
            $this->topicId = $topicId;
        }

        public function getTopicId() {
            return $this->topicId;
        }

        // user id
        public function setUserId($userId) {
            $this->userId = $userId;
        }

        public function getUserId() {
            return $this->userId;
        }

        // title
        public function setTitle($title) {
            self::checkTitle($title);
            $this->title = $title;
        }

        public function getTitle() {
            return $this->title;
        }

        // title check
        public function checkTitle($title) {
            if(empty($title)) {
                throw new Exception("Voer een geldige titel in.");
            }
        }

        // description
        public function setDescription($description) {
            self::checkDescription($description);
            $this->description = $description;
        }

        public function getDescription() {
            return $this->description;
        }

        // description check
        public function checkDescription($description) {
            if(empty($description)) {
                throw new Exception("Voer een geldige omschrijving in.");
            }
        }
        
        // date
        public function setDate($date) {
            $date = new DateTime();
            $this->date = $date->format('Y-m-d');
        }

        public function getDate() {
            return $this->date;
        }

        public function add() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into topics (userId, title, description, date) values (:userId, :title, :description, :date)");
            $statement->bindValue(":userId", $this->userId);
            $statement->bindValue(":title", $this->title);
            $statement->bindValue(":description", $this->description);
            $statement->bindValue(":date", $this->date);
            $statement->execute();
        }

        public static function getAll() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from topics");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getTopicById($id) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from topics where id = :id");
            $statement->bindValue(":id", $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        // delete user topic
        public static function deleteTopic($topicId) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("delete from topics where id = :topicId");
            $statement->bindValue(":topicId", $topicId);
            $statement->execute();
        }
    }