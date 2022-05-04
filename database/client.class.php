<?php
    declare(strict_types = 1);

    class Client extends User {

        public function __construct(int $id, string $name, string $password, string $address, string $phoneNumber) {
            parent::__construct($id, $name, $password, $address, $phoneNumber);
        }

        
        static function getClient(PDO $db, int $id) : Client {
            $stmt = $db->prepare('
                SELECT * 
                FROM Client
                WHERE id_client = ?
            ');

            $stmt->execute(array($id));

            $client = $stmt->fetch();

            return new Client(
                intval($client['id_client']),
                $client['username'],
                $client['password'],
                $client['address'],
                $client['phone_number']
            );
        }


        static function getClientWithPassword(PDO $db, string $username, string $password) : ?Client {
            $stmt = $db->prepare('
              SELECT *
              FROM Client 
              WHERE lower(username) = ? AND password = ?
            ');
            
            // $stmt->execute(array(strtolower($username), sha1($password)));
            $stmt->execute(array(strtolower($username), $password));
        
            if ($client = $stmt->fetch()) {
              return new Client(
                intval($client['id_client']),
                $client['username'],
                $client['password'],
                $client['address'],
                $client['phone_number']
              );
            } else return null;
          }

    }



?>

