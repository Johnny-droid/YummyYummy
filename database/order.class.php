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
                Order by dateStart DESC;
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


        static function getOwnerOrders(PDO $db, int $id_owner) : array {
            $stmt = $db->prepare('
                SELECT *
                FROM Orders
                Where id_order in (
                    select id_order 
                    from (Products_Orders JOIN Product using(id_product))
                         JOIN Restaurant using(id_restaurant)
                    where owner = ?
                )
                Order by dateStart DESC;
            ');

            $stmt->execute(array($id_owner));

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


        static function insertOrder(PDO $db, int $id_client, stdClass $products) : bool {
            $id_order = 0;
            try {
                $stmt1 = $db->prepare('insert into Orders (status, dateStart, dateEnd, id_client, id_courier) 
                         values(?, ?, ?, ?, ?); '); 

                $stmt1->execute(array('RECEIVED', date('d/m/Y H:i:s'), '', $id_client, NULL)); 
                $id_order = $db->lastInsertId();

                $stmt2 = $db->prepare('insert into Products_Orders (id_product, id_order, quantity) values(?, ?, ?)');

                foreach ($products as $id_product=>$quantity) {
                    $stmt2->execute(array($id_product, $id_order, $quantity));
                }
            } catch (PDOException $e) {
                return false; 
            }

            return true;
        }


    }



?>
