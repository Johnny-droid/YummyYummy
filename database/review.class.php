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




    }



?>
