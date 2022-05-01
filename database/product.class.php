<?php
    declare(strict_types = 1);

    class Product {

        public int $id;
        public string $name;
        public float $price;
        public int $discount;
        public int $id_restaurant;

        public function __construct(int $id, string $name, int $price, int $discount, int $id_restaurant) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->discount = $discount;
            $this->id_restaurant = $id_restaurant;
        }

        


    }



?>
