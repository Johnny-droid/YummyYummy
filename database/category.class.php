<?php
    declare(strict_types = 1);

    class Category {

        public int $id;
        public string $name;
        //public string $imageFile;

        public function __construct(int $id, string $name) {
            $this->id = $id;
            $this->name = $name;
            //$this->imageFile = $imageFile;

        }

        
        static function getCategories(PDO $db) : array {
            $stmt = $db->prepare('
                SELECT id_category as id, name
                FROM Category;
            ');

            $stmt->execute();

            $categories = array();

            while ($category = $stmt->fetch()) {
                $categories[] = new Category(
                    intval($category['id']),
                    $category['name']
                );
            }

            return $categories;
        }


        
        static function getRestaurantCategories(PDO $db, int $id_restaurant) : array {
            $stmt = $db->prepare('
                SELECT id_category, name
                FROM Category JOIN RestaurantCategory using(id_category)
                WHERE id_restaurant = ?
            ');

            $stmt->execute(array($id_restaurant));

            $categories = array();

            while ($category = $stmt->fetch()) {
                $categories[] = new Category(
                    intval($category['id_category']),
                    $category['name']
                );
            }

            return $categories;
        }



    }



?>
