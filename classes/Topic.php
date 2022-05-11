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
            $this->title = $title;
        }

        public function getTitle() {
            return $this->title;
        }

        // description
        public function setDescription($description) {
            $this->description = $description;
        }

        public function getDescription() {
            return $this->description;
        }
        
        // date
        public function setDate($date) {
            $date = new DateTime();
            $this->date = $date->format('Y-m-d H:i:s');
        }

        public function getDate() {
            return $this->date;
        }
    }