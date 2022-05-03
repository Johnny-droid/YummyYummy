<?php
    declare(strict_types = 1);

    class Review {

        public int $id_client;
        public int $id_restaurant;
        public int $rating;
        public int $priceScore;
        public string $comment;

        public function __construct(int $id_client, int $id_restaurant, int $rating, int $priceScore, string $comment) {
            $this->id_client = $id_client;
            $this->id_restaurant = $id_restaurant;
            $this->rating = $rating;
            $this->priceScore = $priceScore;
            $this->comment = $comment;

        }

        static function getRestaurantReviews(PDO $db, int $id) : array {
            $stmt = $db->prepare('
                SELECT * 
                FROM Review
                WHERE id_restaurant = ?
            ');

            $stmt->execute(array($id));

            $reviews = array();

            while ($review = $stmt->fetch()) {
                $reviews[] = new Review(
                    intval($review['id_client']),
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

    }



?>
