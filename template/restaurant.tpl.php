<?php function output_restaurant(Restaurant $restaurant, array $categories, array $reviews, array $products) { ?>
    <div class="restaurantGlobal">
        <section class="restaurantInformation">
            <img class="restaurantImage" src="../images/Restaurants/Restaurant<?= $restaurant->id ?>.jpg">
            
            <?php
                if(isset($_SESSION['id']) && $_SESSION['type'] === 'C') { ?>
                <div class="addFavourite">
                    <button class="buttonFav">⭐ ADD TO FAVOURITES</button>
                </div>
            <?php } ?>
            
            <div class="restaurantMainInformation">
                
                <h1><?= $restaurant->name?></h1>
                <p>Rating: <?= Review::getAverageRating($reviews) ?></p>
                <p>Price:  <?= Review::getAveragePriceSymbols($reviews)?></p>
                <p id="restaurantStatus"><?= $restaurant->getOpenOrClosed() ?></p>

            </div>

            <div class="restaurantExtraInformation">

                <h2>Information</h2>
                <div class="restaurantCategories">
                    <strong>Categories:</strong>

                    <?php foreach($categories as $category) {  ?>
                        <div class="restaurantCategory"><?= $category->name ?></div>
                    <?php } ?>

                </div> 
                
                <strong>Phone Number: </strong><?= $restaurant->phoneNumber?>
                <br>
                <strong>Location:</strong> <?= $restaurant->location ?>

            </div>
            
            <div class="menu">
                <h2>Menu</h2>
                <ul>
                    <?php foreach ($products as $product) { ?>
                        <?php if ($product->discount === 0) { ?>
                            <li class="product">
                                <?= $product->name . ' ' . $product->price ?>€
                                <?php if (isset($_SESSION['id']) && $_SESSION['type'] === 'C') { ?>
                                    <button class="productOrderAddButton" value="<?= $product->id ?>"> + </button>
                                <?php } ?>
                            </li>
                        <?php } else { ?>
                            <li class="product">
                                <?= $product->name . ' ' . $product->price * (1 - ($product->discount/100)) ?>€ <br>
                                Discount: <?= $product->discount ?>% &nbsp&nbsp Old price: <?= $product->price ?>€
                                <?php if (isset($_SESSION['id']) && $_SESSION['type'] === 'C') { ?>
                                    <button class="productOrderAddButton" value="<?= $product->id ?>"> + </button>
                                <?php } ?>
                            </li>
                        <?php } ?>
                        
                        
                    <?php } ?>   
                </ul>
                
            </div>

            <div class="reviews">
                <h2>Reviews</h2>

                <?php foreach($reviews as $review) { ?>

                    <article>
                        <div class="reviewHeader">
                            <strong><?= $review->username ?></strong>
                            <div class="reviewRating"><?= $review->rating ?></div>
                            <div class="reviewPrice"><?= $review->getPriceSymbols() ?></div>
                        </div>
                        <p class="reviewComment"><?= $review->comment ?></p>
                    
                    <article>
                <?php } ?>

            </div>

        </section>
        <?php if (isset($_SESSION['id']) && $_SESSION['type'] === 'C') { ?>
            <aside class="clientOrders">
                <h1>Order</h1>
                <?php if(isset($_GET['error'])) {
                        if ($_GET['error'] == 1) { ?>
                            <small class="error">You need to select products for your order</small>
                <?php } else if ($_GET['error'] == 2) { ?>
                    <small class="error">An error occured. Check if the products are from the same restaurant</small>
                <?php } 
                    } ?>
                <button id="makeOrder">Make Order</button>


            </aside>
        <?php } ?>


    </div>
    

<?php } ?>



