<?php function output_orders(?array $orders, ?array $orders_products, ?array $restaurants, ?array $orders_address) { ?>
    <section class="ordersGlobal">
        <?php if ($_SESSION['type'] === 'E') { ?>
            <h1>YOUR ORDERS</h1>
        <?php } ?>
        <?php foreach ($orders_products as $id_order=>$products) {  ?>
            <article>
                <div class="order">
                    <div class="orderInformation">
                        <h2 class="orderRestaurant"><?= $restaurants[reset($products[0])->id_restaurant]->name ?></h2>
                        <ul>
                            <?php foreach ($products as $product) { ?>
                                <li><?= htmlentities($product[0]->name) . '  ' . round($product[0]->price * (1 - ($product[0]->discount/100)), 2) . '€   (' . $product[1] . ') ' ?></li>
                            <?php  } ?>
                        </ul>
                        <strong>Price: <?= Product::getTotalPriceProducts($products) ?> € </strong><br>
                        <strong>Date Ordered: <?= $orders[$id_order]->dateStart->format('d/m/Y H:i:s') ?></strong>
                        <?php if (isset($_SESSION['id']) && $_SESSION['type'] === 'E') { ?>
                            <strong>Address: <?= $orders_address[$id_order] ?></strong>
                        <?php } ?>
                    </div>
                    
                    <div class="orderStatus" id="orderStatus<?= $id_order ?>">
                        <strong><?= $orders[$id_order]->status ?></strong>
                    </div>
                </div>

                <?php if (isset($_SESSION['id']) && $_SESSION['type'] !== 'C') { ?>
                    <div class="orderButtons">
                        <button id="buttonPrevious<?= $id_order ?>">PREVIOUS</button>
                        <button id="buttonNext<?= $id_order ?>">NEXT</button>
                    </div>
                <?php } ?>
            
            </article>
        <?php } ?>
            

    </section>
<?php } ?>



<?php function output_orders_courier(?array $orders, ?array $orders_products, ?array $restaurants, ?array $orders_address) { ?>
    <section class="ordersGlobal">
        <?php if ($_SESSION['type'] === 'E') { ?>
            <h1>AVAILABLE ORDERS</h1>
        <?php } ?>
        <?php foreach ($orders_products as $id_order=>$products) {  ?>
            <article id="availableOrder<?= $id_order ?>">
                <div class="order">
                    <div class="orderInformation">
                        <h2 class="orderRestaurant"><?= $restaurants[reset($products[0])->id_restaurant]->name ?></h2>
                        <ul>
                            <?php foreach ($products as $product) { ?>
                                <li><?= $product[0]->name . '  ' . ($product[0]->price * (1 - ($product[0]->discount/100))) . '€   (' . $product[1] . ') ' ?></li>
                            <?php  } ?>
                        </ul>
                        <strong>Price: <?= Product::getTotalPriceProducts($products) ?> € </strong><br>
                        <strong>Date Ordered: <?= $orders[$id_order]->dateStart->format('d/m/Y H:i:s') ?></strong>
                        <?php if (isset($_SESSION['id']) && $_SESSION['type'] === 'E') { ?>
                            <strong>Address: <?= $orders_address[$id_order] ?></strong>
                        <?php } ?>
                    </div>
                    
                    <div class="orderStatus" id="orderStatus<?= $id_order ?>">
                        <strong><?= htmlentities($orders[$id_order]->status) ?></strong>
                    </div>
                </div>


                <div class="orderButtons">
                    <button id="buttonAccept<?= $id_order ?>">Accept</button> <!-- add some css class to these buttons -->
                </div>
            
            </article>
        <?php } ?>
            

    </section>
<?php } ?>