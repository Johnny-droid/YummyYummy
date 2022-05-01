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

    }



?>