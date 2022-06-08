<?php
    declare(strict_types = 1);

    class Review {

        public int $id_review;
        public int $id_client;
        public string $username;
        public int $id_restaurant;
        public int $rating;
        public int $priceScore;
        public string $comment;
        public string $reply;

        public function __construct(int $id_review, int $id_client, string $username, int $id_restaurant, int $rating, int $priceScore, string $comment, string $reply) {    
            $this->id_review = $id_review; 
            $this->id_client = $id_client;
            $this->username = $username;
            $this->id_restaurant = $id_restaurant;
            $this->rating = $rating;
            $this->priceScore = $priceScore;
            $this->comment = $comment;
            $this->reply = $reply;
            
        }

        static function getRestaurantReviews(PDO $db, int $id) : array {
            $stmt = $db->prepare('
                SELECT * 
                FROM (select id_review, id_client as id_user, id_restaurant, rating, price, comment, reply FROM Review) 
                     JOIN User using(id_user)
                WHERE id_restaurant = ?;
            ');

            $stmt->execute(array($id));

            $reviews = array();

            while ($review = $stmt->fetch()) {
                $reviews[] = new Review(
                    intval($review['id_review']),
                    intval($review['id_user']),
                    $review['username'],
                    intval($review['id_restaurant']),
                    intval($review['rating']),
                    intval($review['price']),
                    $review['comment'],
                    $review['reply']
                );
            }

            return $reviews;
        }




        static function alreadyHasReview(PDO $db, int $id_client, int $id_restaurant) : bool {
            $stmt = $db->prepare('
                SELECT * 
                FROM Review
                WHERE id_restaurant = ? AND id_client = ?
            ');

            $stmt->execute(array($id_restaurant, $id_client));

            if ($stmt->fetch()) {
                return true;
            }
            return false;
        }


        static function alreadyHasReply(PDO $db, int $id_review) : bool {
            $stmt = $db->prepare('
                SELECT * 
                FROM Review
                WHERE id_review = ?;
            ');

            $stmt->execute(array($id_review));

            $review = $stmt->fetch();

            if ($review['reply'] === '') {
                return false;
            }
            return true;
        }


        static function addReview(PDO $db, int $id_client, int $id_restaurant, int $rating, int $price, string $comment) : bool {

            $previousReview = Review::alreadyHasReview($db, $id_client, $id_restaurant);
            
            if ($previousReview) return false;

            //try {
                $stmt1 = $db->prepare('insert into Review (id_client, id_restaurant, rating, price, comment, reply) 
                         values(?, ?, ?, ?, ?, ?); '); 

                $stmt1->execute(array($id_client, $id_restaurant, $rating, $price, $comment, '')); 
                
            //} catch (PDOException $e) {
            //    return false;
            //}
            
            return true;
        }



        static function addReply(PDO $db, int $id_review, string $reply) : bool {
            
            $previousReply = Review::alreadyHasReply($db, $id_review);

            if ($previousReply) return false;

            $stmt1 = $db->prepare('update Review set reply = ? where id_review = ?; '); 

            $stmt1->execute(array($reply, $id_review)); 
            
            return true;
        }




        static function getAverageRating(array $reviews) : float {
            if (sizeof($reviews) === 0) {return 0;}

            $sum = 0;
            foreach($reviews as $review) {$sum += $review->rating;}

            return $sum / sizeof($reviews);
        }



        static function getAveragePriceSymbols(array $reviews) : string {
            if (sizeof($reviews) === 0) {return "unknown";}

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
