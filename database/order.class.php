<?php
    declare(strict_types = 1);
    
    class Order {

        public int $id;
        public string $status;
        public DateTime $dateStart;
        public ?DateTime $dateEnd;
        public int $id_client;

        public function __construct(int $id, string $status, DateTime $dateStart, ?DateTime $dateEnd, int $id_client) {
            $this->id = $id;
            $this->status = $status;
            $this->dateStart = $dateStart;
            $this->dateEnd = $dateEnd;
            $this->id_client = $id_client;
        }

        static function getClientOrders(PDO $db, int $id_client) : array {
            $stmt = $db->prepare('
                SELECT *
                FROM Orders
                Where id_client = ?
            ');

            $stmt->execute(array($id_client));

            $orders = array();

            while ($order = $stmt->fetch()) {
                if ($order['dateEnd'] === '') {
                    $orderDateEnd = null;
                } else {
                    $orderDateEnd = DateTime::createFromFormat('d/m/Y H:i:s', $order['dateEnd']);
                }

                $orders[intval($order['id_order'])] = new Order(
                    intval($order['id_order']),
                    $order['status'],
                    DateTime::createFromFormat('d/m/Y H:i:s', $order['dateStart']),
                    $orderDateEnd,
                    intval($order['id_client'])
                );
            }

            return $orders;
        }


    }



?>
