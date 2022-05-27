<?php
    declare(strict_types = 1);

    class Review {

        public int $id_client;
        public string $username;
        public int $id_restaurant;
        public int $rating;
        public int $priceScore;
        public string $comment;

        public function __construct(int $id_client, string $username, int $id_restaurant, int $rating, int $priceScore, string $comment) {
            $this->id_client = $id_client;
            $this->username = $username;
            $this->id_restaurant = $id_restaurant;
            $this->rating = $rating;
            $this->priceScore = $priceScore;
            $this->comment = $comment;

        }

        static function getRestaurantReviews(PDO $db, int $id) : array {
            $stmt = $db->prepare('
                SELECT * 
                FROM (select id_client as id_user, id_restaurant, rating, price, comment FROM Review) 
                     JOIN User using(id_user)
                WHERE id_restaurant = ?
            ');

            $stmt->execute(array($id));

            $reviews = array();

            while ($review = $stmt->fetch()) {
                $reviews[] = new Review(
                    intval($review['id_user']),
                    $review['username'],
                    intval($review['id_restaurant']),
                    intval($review['rating']),
                    intval($review['price']),
                    $review['comment']
                );
            }

            return $reviews;
        }


        static function getAverageRating(array $reviews) : float {
            if (sizeof($reviews) === 0) {return 0;}

            $sum = 0;
            foreach($reviews as $review) {$sum += $review->rating;}

            return $sum / sizeof($reviews);
        }



        static function getAveragePriceSymbols(array $reviews) : string {
            if (sizeof($reviews) === 0) {return 0;}

            $sum = 0;
            foreach($reviews as $review) {$sum += $review->priceScore;}
            $average = round($sum / sizeof($reviews));
            
            $string = "";
            for ($i = 1; $i <= $average; $i++) {
                $string = $string . "€ ";
            }

            return $string;
        }
        	
        function getPriceSymbols() : string {

            $string = "";
            for ($i = 1; $i <= $this->priceScore; $i++) {
                $string = $string . "€ ";
            }

            return $string;
        }

    }



?>
