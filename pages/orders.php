<?php
    declare(strict_types = 1);

    session_start();
    
    require_once(__DIR__ . '/../template/common.php'); 
    require_once(__DIR__ . '/../template/orders.tpl.php');

    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/order.class.php');
    require_once(__DIR__ . '/../database/product.class.php');
    require_once(__DIR__ . '/../database/restaurant.class.php');

    $db = getDatabaseConnection();

    if (!isset($_SESSION['id'])) {
        header('Location: ../pages/signup.php?error=4');
        exit();
    }
    
    $id_user = intval($_SESSION['id']);

    if ($_SESSION['type'] === 'C') {
        $orders = Order::getClientOrders($db, $id_user); 
    } else if ($_SESSION['type'] === 'O') {
        $orders = Order::getOwnerOrders($db, $id_user);
    } else if ($_SESSION['type'] === 'E') {
        $orders_free = Order::getCourierFreeOrders($db);
        $orders = Order::getCourierOrders($db, $id_user);
        $_SESSION['orders_free'] = $orders_free;
    } else {
        exit();
    }


    $_SESSION['orders'] = $orders;
    
    if($orders) {
        $orders_products = Product::getOrdersProducts($db, $orders); //order -> [(product, quantity), (product, quantity), ...]
        $restaurants = Restaurant::getRestaurants($db);
    }

    if ($orders_free) {
        $orders_products_free =  Product::getOrdersProducts($db, $orders_free);
    }
   
    
    
    output_header(); 
    if ($_SESSION['type'] === 'E') { ?>
        <div class="ordersGlobalCourier">
        <?php output_orders_courier($orders_free, $orders_products_free, $restaurants);
        output_orders($orders, $orders_products, $restaurants);?>
        </div> 
    <?php
    } else {
        output_orders($orders, $orders_products, $restaurants);
    }
    
    output_footer(); 
?>