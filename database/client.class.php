<?php
    declare(strict_types = 1);

    class Client {

        public int $id;
        public string $name;
        public string $password;
        public string $address;
        public string $phoneNumber;

        public function __construct(int $id, string $name, string $password, string $address, string $phoneNumber) {
            $this->id = $id;
            $this->name = $name;
            $this->password = $password;
            $this->address = $address;
            $this->phoneNumber = $phoneNumber;
        }




    }



?>

