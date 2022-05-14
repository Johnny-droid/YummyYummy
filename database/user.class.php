<?php
    declare(strict_types = 1);

    class User {

        public int $id;
        public string $name;
        public string $password;
        public string $address;
        public string $phoneNumber;
        public string $email; 
        public int $age; 
        public string $bio; 
        public string $type; 

        public function __construct(int $id, string $name, string $password, string $address, string $phoneNumber,
                                    string $email, int $age, string $bio, string $type) {
            $this->id = $id;
            $this->name = $name;
            $this->password = $password;
            $this->address = $address;
            $this->phoneNumber = $phoneNumber;
            $this->email = $email; 
            $this->age = $age; 
            $this->bio = $bio; 
            $this->type = $type; 
        }


        static function getUser(PDO $db, int $id) : User {
            $stmt = $db->prepare('SELECT * FROM User WHERE id_user = ?'); 

            $stmt->execute(array($id)); 

            $user = $stmt->fetch(); 

            return new User(
                intval($client['id_user']), 
                $client['username'], 
                $client['password'], 
                $client['address'], 
                $client['phone_number'], 
                $client['email'], 
                intval($client['age']),
                $client['bio'], 
                $client['user_type']
            ); 
        }

        static function getUserWithPassword(PDO $db, string $username, string $password) : User {
            $stmt = $db->prepare('SELECT * FROM User WHERE username = ? AND password = ?'); 

            $stmt->execute(array());

            return new User(); 
        }

        static function existsWithUsername(PDO $db, string $username) : bool {

            return false; 
        }

        static function saveUser(PDO $db, string $username, string $password, string $address, string $phone_number,
                                string $email, int $age, string $bio, string $type) {

        }
    }

?>

