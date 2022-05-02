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
            self::checkPassword($password);

            $options = [
                'cost' => 12,
            ];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);

            $this->password = $password;
        }

        public function getPassword() {
            return $this->password;
        }

        // password check
        private function checkPassword($password){
            if($password === "") {
                throw new Exception("Voer een geldig wachtwoord in.");
            }

            if(strpos($password, " ")) {
                throw new Exception("Het wachtwoord mag geen spaties bevatten.");
            }

            if(strlen($password) <= 5) {
                throw new Exception("Stel een minimale wachtwoordlengte in van 6 tekens.");
            }
        }

        // streetname
        public function setStreetname($streetname) {
            self::checkStreetname($streetname);
            $this->streetname = $streetname;
        }

        public function getStreetname() {
            return $this->streetname;
        }

        // streetname check
        public function checkStreetname($streetname) {
            if($streetname === "") {
                throw new Exception("Voer een geldige straatnaam in.");
            }
        }

        // number
        public function setNumber($number) {
            self::checkNumber($number);
            $this->number = $number;
        }

        public function getNumber() {
            return $this->number;
        }

        // number check
        public function checkNumber($number) {
            if($number === "") {
                throw new Exception("Voer een geldig huisnummer in.");
            }
        }

        // place
        public function setPlace($place) {
            self::checkPlace($place);
            $this->place = $place;
        }

        public function getPlace() {
            return $this->place;
        }

        // place check
        public function checkPlace($place) {
            if($place === "") {
                throw new Exception("Voer een geldig plaats in.");
            }
        }

        // signup
        public function signup() {
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into users (firstname, lastname, email, password, streetname, number, place) values (:firstname, :lastname, :email, :password, :streetname, :number, :place)");
            $statement->bindValue(":firstname", $this->firstname);
            $statement->bindValue(":lastname", $this->lastname);
            $statement->bindValue(":email", $this->email);
            $statement->bindValue(":password", $this->password);
            $statement->bindValue(":streetname", $this->streetname);
            $statement->bindValue(":number", $this->number);
            $statement->bindValue(":place", $this->place);
            $result = $statement->execute();
            return $result;
        }

        // login
        public static function login($email, $password) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select * from users where email = :email");
            $statement->bindValue(":email", $email);
            $statement->execute();
            $user = $statement->fetch();
            $hash = $user['password'];

            if(!$user) {
                return false;
            }
            
            if(password_verify($password, $hash)) {
                return true;
            } 
            else {
                return false;
            }
        }

        // get the user id based on the email
        public static function getUserIdByEmail($email) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("select id from users where email = :email");
            $statement->bindValue(":email", $email);
            $statement->execute();
            $result = $statement->fetch();
            return $result['id'];
        }
    }