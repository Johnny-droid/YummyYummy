<?php
    declare(strict_types = 1);

    class Product {

        public int $id;
        public string $name;
        public float $price;
        public int $discount;
        public int $id_restaurant;

        public function __construct(int $id, string $name, float $price, int $discount, int $id_restaurant) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->discount = $discount;
            $this->id_restaurant = $id_restaurant;
        }

        static function getProduct(PDO $db, int $id_product) : Product {
            $stmt = $db->prepare('
                SELECT * 
                FROM Product
                WHERE id_product = ?
            ');

            $stmt->execute(array($id_product));

            $product = $stmt->fetch();

            return new Product(
                intval($product['id_product']),
                $product['name'],
                floatval($product['price']),
                intval($product['discount']),
                intval($product['id_restaurant'])
            );
        }


        static function getRestaurantProducts(PDO $db, int $id_restaurant) : array {
            $stmt = $db->prepare('
                SELECT *
                FROM Product
                Where id_restaurant = ?
            ');

            $stmt->execute(array($id_restaurant));

            $products = array();

            while ($product = $stmt->fetch()) {

                $products[] = new Product(
                    intval($product['id_product']),
                    $product['name'],
                    floatval($product['price']),
                    intval($product['discount']),
                    intval($product['id_restaurant'])
                );
            }

            return $products;
        }




        static function getOrdersProducts(PDO $db, array $orders) : array {
            $ordersProducts = array();
            

            foreach ($orders as $order) {
                $stmt = $db->prepare('
                    SELECT *
                    FROM Products_Orders JOIN Product using(id_product)
                    WHERE id_order = ?
                ');
                
                $stmt->execute(array($order->id));

                $products = array();

                while ($product = $stmt->fetch()) {
                    $products[] = array(new Product(
                        intval($product['id_product']),
                        $product['name'],
                        floatval($product['price']),
                        intval($product['discount']),
                        intval($product['id_restaurant'])
                    ), $product['quantity']);
                }

                $ordersProducts[$order->id] = $products;
            }
            
            return $ordersProducts;
        }

        static function getTotalPriceProducts(array $products) : float {
            $sum = 0;
            foreach ($products as $product) {
                $sum += $product[0]->price * $product[1];   // 0 is the product, 1 is the quantity
            }
            return $sum;
        }


    }



?>

