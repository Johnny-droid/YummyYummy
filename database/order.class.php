<?php
    declare(strict_types = 1);
    
    enum Status {
        case RECEIVED;
        case PREPARING;
        case READY;
        case DELIVERED;
    }
    
    class Order {

        public int $id;
        public Status $status;
        public DateTime $dateStart;
        public DateTime $dateEnd;
        public int $id_client;

        public function __construct(int $id, Status $status, DateTime $dateStart, DateTime $dateEnd, int $id_client) {
            $this->id = $id;
            $this->status = $status;
            $this->dateStart = $dateStart;
            $this->dateEnd = $dateEnd;
            $this->id_client = $id_client;
        }

        


    }



?>
