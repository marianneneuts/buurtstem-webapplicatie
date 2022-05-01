<?php
    include_once(__DIR__ . "/Db.php");

    class User {
        private $userId;
        private $firstname;
        private $lastname;
        private $email;
        private $password;
        private $streetname;
        private $number;
        private $place;

        // id
        public function setUserId($userId) {
            $this->userId = $userId;
        }

        public function getUserId() {
            return $this->userId;
        }

        // firstname
        public function setFirstname($firstname) {
            $this->firstname = $firstname;
        }

        public function getFirstname() {
            return $this->firstname;
        }

        // lastname
        public function setLastname($lastname) {
            $this->lastname = $lastname;
        }

        public function getLastname() {
            return $this->lastname;
        }

        // email
        public function setEmail($email) {
            $this->email = $email;
        }

        public function getEmail() {
            return $this->email;
        }

        // password
        public function setPassword($password) {
            $options = [
                'cost' => 12,
            ];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);

            $this->password = $password;
        }

        public function getPassword() {
            return $this->password;
        }

        // streetname
        public function setStreetname($streetname) {
            $this->streetname = $streetname;
        }

        public function getStreetname() {
            return $this->streetname;
        }

        // number
        public function setNumber($number) {
            $this->number = $number;
        }

        public function getNumber() {
            return $this->number;
        }

        // place
        public function setPlace($place) {
            $this->place = $place;
        }

        public function getPlace() {
            return $this->place;
        }
    }