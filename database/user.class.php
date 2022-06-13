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
            $stmt = $db->prepare('select * from User where id_user = ?'); 

            $stmt->execute(array($id)); 

            $user = $stmt->fetch(); 

            return new User(
                intval($user['id_user']), 
                $user['username'], 
                $user['password'], 
                $user['address'], 
                $user['phone_number'], 
                $user['email'], 
                intval($user['age']),
                $user['bio'], 
                $user['user_type']
            ); 
        }


        static function getUserWithPassword(PDO $db, string $username, string $password) : ?User {
            $stmt = $db->prepare('select * from User where username = ?'); 

            $stmt->execute(array(strtolower($username)));

            $user = $stmt->fetch(); 

            if(!$user || !password_verify($password, $user['password'])) { return null;}

            return new User(
                intval($user['id_user']), 
                $user['username'], 
                $user['password'], 
                $user['address'], 
                $user['phone_number'], 
                $user['email'], 
                intval($user['age']),
                $user['bio'], 
                $user['user_type']
            ); 
        }

        static function existsWithUsername(PDO $db, string $username) : bool {
            $stmt = $db->prepare('SELECT * from User WHERE lower(username) = ?'); 

            $stmt->execute(array(strtolower($username))); 

            if($stmt->fetch()) return true; 

            else return false; 
        }

        static function saveUser(PDO $db, string $username, string $password, string $address, string $phone_number,
                                string $email, int $age, string $bio, string $type): bool {
            //try {
                $stmt = $db->prepare('insert into User (username, password, address, phone_number, email, age, bio, user_type) 
                         values(?, ?, ?, ?, ?, ?, ?, ?); '); 

                $hashed_password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
                
                $stmt->execute(array($username, $hashed_password, $address, $phone_number, $email, $age, $bio, $type)); 
                return true; 
            //} catch (PDOException $e) {
            //    return false; 
            //}
        }

        static function existsFavourite(PDO $db, int $id_user, int $id_restaurant, bool $change) : bool {

            $stmt1 = $db->prepare('
                SELECT *
                FROM Favourite
                Where id_user = ? AND id_restaurant = ?;
            ');

            $stmt1->execute(array($id_user, $id_restaurant));

            $favourite =  $stmt1->fetch();

            if ($favourite) {
                $exists = true;
            } else {
                $exists = false;
            }

            if (!$change) {return $exists;}

            if ($exists) {
                $stmt2 = $db->prepare('delete from Favourite where id_user = ? AND id_restaurant = ?');
            } else {
                $stmt2 = $db->prepare('insert into Favourite values(?, ?); ');
            }

            $stmt2->execute(array($id_user, $id_restaurant));

            return !$exists;
        }




        //write the update functions here

        static function updateAge(PDO $db, int $id_user, int $age) : string {

            //try catch here return new or previous value
            $stmt1 = $db->prepare('update User set age = ?  where id_user = ?; '); 

            $stmt1->execute(array($age, $id_user)); 

            return 'Age: ' . $age;
        }

        static function updateAddress(PDO $db, int $id_user, string $address) : string {

            //try catch here return new or previous value
            $stmt1 = $db->prepare('update User set address = ?  where id_user = ?; '); 

            $stmt1->execute(array($address, $id_user)); 

            return 'Address: ' . $address;
        }

        static function updatePhoneNumber(PDO $db, int $id_user, int $phone) : string {

            //try catch here return new or previous value
            $stmt1 = $db->prepare('update User set phone_number = ?  where id_user = ?; '); 

            $stmt1->execute(array($phone, $id_user)); 

            return 'Phone Number: ' . $phone;
        }

        static function updateEmail(PDO $db, int $id_user, string $email) : string {

            //try catch here return new or previous value
            $stmt1 = $db->prepare('update User set email = ?  where id_user = ?; '); 

            $stmt1->execute(array($email, $id_user)); 

            return 'Email: ' . $email;
        }

        static function updateBio(PDO $db, int $id_user, string $bio) : string {

            //try catch here return new or previous value
            $stmt1 = $db->prepare('update User set bio = ?  where id_user = ?; '); 

            $stmt1->execute(array($bio, $id_user)); 

            return 'Bio: ' . $bio;
        }



    }
?>

