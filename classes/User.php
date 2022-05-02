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
            self::checkFirstname($firstname);
            $this->firstname = $firstname;
        }

        public function getFirstname() {
            return $this->firstname;
        }

        // firstname check
        public function checkFirstname($firstname) {
            if($firstname === "") {
                throw new Exception("Voer een geldige voornaam in.");
            }
        }

        // lastname
        public function setLastname($lastname) {
            self::checkLastname($lastname);
            $this->lastname = $lastname;
        }

        public function getLastname() {
            return $this->lastname;
        }

        // lastname check
        public function checkLastname($lastname) {
            if($lastname === "") {
                throw new Exception("Voer een geldige achternaam in.");
            }
        }

        // email
        public function setEmail($email) {
            self::checkEmail($email);
            $this->email = $email;
        }

        public function getEmail() {
            return $this->email;
        }

        // email check
        public function checkEmail($email) {
            if(empty($email)) {
                throw new Exception("Voer een geldig e-mailadres in.");
            }

            if(!strpos($email, '@')) {
                throw new Exception("Voer een geldig e-mailadres in.");
            }
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