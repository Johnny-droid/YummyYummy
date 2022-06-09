<?php
    declare(strict_types = 1);


    class Restaurant {
        
        public int $id;
        public string $name;
        public string $phoneNumber;
        public string $location;
        public DateTime $openingTime;  //We might need to change the sql to date, because php doesn't have a time object apparently
        public DateTime $closingTime;
        public int $owner;
        

        public function __construct(int $id, string $name, string $phoneNumber, string $location, DateTime $openingTime, DateTime $closingTime, int $owner) {
            $this->id = $id;
            $this->name = $name;
            $this->phoneNumber = $phoneNumber;
            $this->location = $location;
            $this->openingTime = $openingTime;
            $this->closingTime = $closingTime;
            $this->owner = $owner;

        }

        static function getRestaurants(PDO $db) : array {
            $stmt = $db->prepare('
                SELECT *
                FROM Restaurant;
            ');

            $stmt->execute();

            $restaurants = array();

            while ($restaurant = $stmt->fetch()) {
                $restaurants[intval($restaurant['id_restaurant'])] = new Restaurant(
                    intval($restaurant['id_restaurant']),
                    $restaurant['name'],
                    $restaurant['phone'],
                    $restaurant['location'],
                    DateTime::createFromFormat('H:i', $restaurant['openingTime']),
                    DateTime::createFromFormat('H:i', $restaurant['closingTime']),
                    intval($restaurant['owner'])
                    );
            }

            return $restaurants;
        }

        static function getRestaurantsSearch(PDO $db, string $search, int $limit) : array {
            $stmt = $db->prepare('
                SELECT *
                FROM Restaurant
                WHERE name LIKE ?
                LIMIT ?;
            ');

            $stmt->execute(array('%' . $search . '%', $limit));

            $restaurants = array();

            while ($restaurant = $stmt->fetch()) {
                $restaurants[] = new Restaurant(
                    intval($restaurant['id_restaurant']),
                    $restaurant['name'],
                    $restaurant['phone'],
                    $restaurant['location'],
                    DateTime::createFromFormat('H:i', $restaurant['openingTime']),
                    DateTime::createFromFormat('H:i', $restaurant['closingTime']),
                    intval($restaurant['owner'])
                    );
            }

            return $restaurants;
        }

        static function getRestaurant(PDO $db, int $id) : Restaurant {
            $stmt = $db->prepare('
                SELECT * 
                FROM RESTAURANT
                WHERE id_restaurant = ?
            ');

            $stmt->execute(array($id));

            $restaurant = $stmt->fetch();

            return new Restaurant(
                intval($restaurant['id_restaurant']),
                $restaurant['name'],
                $restaurant['phone'],
                $restaurant['location'],
                DateTime::createFromFormat('H:i', $restaurant['openingTime']),
                DateTime::createFromFormat('H:i', $restaurant['closingTime']),
                intval($restaurant['owner'])
            );
        }


        static function getClientFavouriteRestaurants(PDO $db, int $id_user) : array {
 
            $stmt = $db->prepare('select distinct *
                                from Favourite JOIN Restaurant using(id_restaurant)
                                where id_user = ?; '); 

            $stmt->execute(array($id_user)); 
    
            $restaurants = array(); 

            while ($restaurant = $stmt->fetch()) {
                $restaurants[] = new Restaurant(
                    intval($restaurant['id_restaurant']),
                    $restaurant['name'],
                    $restaurant['phone'],
                    $restaurant['location'],
                    DateTime::createFromFormat('H:i', $restaurant['openingTime']),
                    DateTime::createFromFormat('H:i', $restaurant['closingTime']),
                    intval($restaurant['owner'])
                    );
            }

            return $restaurants; 
        }


        static function getOwnerRestaurants(PDO $db, int $id_owner) : array {
            $stmt = $db->prepare('SELECT *
                    FROM Restaurant
                    WHERE owner = ?;'); 

            $stmt->execute(array($id_owner)); 
            
            while ($restaurant = $stmt->fetch()) {
                $restaurants[] = new Restaurant(
                    intval($restaurant['id_restaurant']),
                    $restaurant['name'],
                    $restaurant['phone'],
                    $restaurant['location'],
                    DateTime::createFromFormat('H:i', $restaurant['openingTime']),
                    DateTime::createFromFormat('H:i', $restaurant['closingTime']),
                    intval($restaurant['owner'])
                );
            }

            return $restaurants;
        }

        
        function getOpenOrClosed() : string {
            $strOpenTime =  $this->openingTime->format('H:i');
            $strClosedTime = $this->closingTime->format('H:i');
            if (time() >= strtotime($strOpenTime)  && time() <= strtotime($strClosedTime)) {
                return 'Open';
            } else {
                return 'Closed';
            }

        } 


    }
?>

