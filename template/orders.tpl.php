<?php function output_orders(array $orders, array $orders_products, array $restaurants) { ?>
    <section class="ordersGlobal">
        <?php foreach ($orders_products as $id_order=>$products) {  ?>
            <article>
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
                    </div>
                    
                    <div class="orderStatus" id="orderStatus<?= $id_order ?>">
                        <strong><?= $orders[$id_order]->status ?></strong>
                    </div>
                </div>

                <?php if (isset($_SESSION['id']) && $_SESSION['type'] === 'O') { ?>
                    <div class="orderButtons">
                        <button id="buttonPrevious<?= $id_order ?>">PREVIOUS</button> <!-- add some css class to these buttons -->
                        <button id="buttonNext<?= $id_order ?>">NEXT</button>
                    </div>
                <?php } ?>
            
            </article>
        <?php } ?>
            

    </section>


<?php } ?>