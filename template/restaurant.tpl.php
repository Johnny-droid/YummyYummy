<?php function output_restaurant(Restaurant $restaurant, array $categories, array $reviews, array $products, bool $alreadyHasReview) { ?>
    <div class="restaurantGlobal">
        <section class="restaurantInformation">
            <img class="restaurantImage" src="../images/Restaurants/Restaurant<?= $restaurant->id ?>.jpg">
            
            <?php
                if(isset($_SESSION['id']) && $_SESSION['type'] === 'C') { ?>
                <div class="addFavourite">
                    <button id="buttonFavourite" class="buttonFav">⭐ ADD TO FAVOURITES</button>
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
                            <li class="product" id="productItem<?= $product->id ?>">
                                <div id="productItemInfo<?= $product->id ?>">
                                    <?= htmlentities($product->name) . ' ' . round($product->price,2) ?>€
                                </div>
                                
                                <?php if (isset($_SESSION['id']) && $_SESSION['type'] === 'C') { ?>
                                    <button class="productOrderAddButton" value="<?= $product->id ?>"> + </button>
                                <?php } ?>

                                <?php if(isset($_SESSION['ids_restaurants_owned'][$_SESSION['id_restaurant']])) { ?>  
                                    
                                    <div class="editProductDiv">
                                        <button id="saveCheckBox<?= $product->id ?>" class="itemRestaurantButtonDiscountApply" value="<?= $product->id ?>" style="display: none;">&#10003</button>
                                        <input id="inputDiscount<?= $product->id ?>" type="number" style="display: none;" min="0" max="100">
                                        <button id="buttonDiscount<?= $product->id ?>" class="itemRestaurantButtonDiscount" value="0">%</button>
                                        <button class="itemRestaurantButtonDelete" value="<?= $product->id ?>"><span class="delete">🗑️</span></button>
                                    </div>
                                <?php } ?>
                            </li>
                        <?php } else { ?>
                            <li class="product" id="productItem<?= $product->id ?>">
                                <div id="productItemInfo<?= $product->id ?>">
                                    <?= htmlentities($product->name) . ' ' . round($product->price * (1 - ($product->discount/100)), 2) ?>€ <br>
                                    Discount: <?= $product->discount ?>% &nbsp&nbsp Old price: <?= $product->price ?>€
                                </div>
                                
                                <?php if (isset($_SESSION['id']) && $_SESSION['type'] === 'C') { ?>
                                    <button class="productOrderAddButton" value="<?= $product->id ?>"> + </button>
                                <?php } ?>

                                <?php if(isset($_SESSION['ids_restaurants_owned'][$_SESSION['id_restaurant']])) { ?>
                                    
                                    <div class="editProductDiv">
                                        <button id="saveCheckBox<?= $product->id ?>" class="itemRestaurantButtonDiscountApply" value="<?= $product->id ?>" style="display: none;">&#10003</button>
                                        <input id="inputDiscount<?= $product->id ?>" type="number" style="display: none;" min="0" max="100">
                                        <button id="buttonDiscount<?= $product->id ?>" class="itemRestaurantButtonDiscount" value="0">%</button>
                                        <button class="itemRestaurantButtonDelete" value="<?= $product->id ?>"><span class="delete">🗑️</span></button>
                                    </div>
                                   
                                <?php } ?>

                            </li>
                        <?php } ?>
                        
                    <?php } ?>  
                    <div class="additing">
                    <?php if (isset($_SESSION['ids_restaurants_owned'][$_SESSION['id_restaurant']])) { ?>
                        
                            <button id="buttonAddItem<?= $restaurant->id ?>" class="addItemButton" onclick="toggleDisplayButton('buttonAddItem<?= $restaurant->id ?>', 'addItemForm<?= $restaurant->id ?>', 'Add to Menu', 'Hide')">Add to Menu</button>
                            <form method="POST" id="addItemForm<?= $restaurant->id ?>" class="addItemForm" action="../action/action_add_item_menu.php">
                                <input class="itemName" type="text" name="itemName" placeholder="Item name">
                                <input class="itemPrice" type="number" min="0" step="0.01" name="itemPrice" placeholder="Item price">
                                <input style="display: none;" type="number" name="id_restaurant" value="<?= $restaurant->id ?>">
                                <button type="submit">Submit</button>
                            </form>
                        <?php } ?>
                    </div>    
                </ul>
                
            </div>

            <div class="reviews">
                <h2>Reviews</h2>

                <?php foreach($reviews as $review) { ?>
                    <div class="review">
                        <div class="reviewHeader">
                            <strong><?= htmlentities($review->username) ?></strong>
                            <div class="reviewRating"><?= htmlentities($review->rating) ?></div>
                            <div class="reviewPrice"><?= $review->getPriceSymbols() ?></div>
                        </div>
                        <p class="reviewComment">▸ <?= htmlentities($review->comment) ?></p>

                        <div class="reviewReply">
                        <?php if ($review->reply !== '') { ?>
                            <em>Reply: </em>
                            <p>▹<?= htmlentities($review->reply) ?></p>
                        <?php } else if ($review->reply === '' && isset($_SESSION['ids_restaurants_owned'][$_SESSION['id_restaurant']])) { ?>
                            <?php if (isset($_GET['error_reply'])) { ?>
                                <?php if ($_GET['error_reply'] === '1') { ?>   
                                    <small class="error">You must be a Restaurant Owner to make the review</small>
                                <?php } else if ($_GET['error_reply'] === '2') { ?>
                                    <small class="error">Your reply is invalid</small>
                                <?php } else if ($_GET['error_reply'] === '3') { ?>
                                    <small class="error">You must be the Restaurant Owner to make the review</small>
                                <?php } else if ($_GET['error_reply'] === '4') { ?>
                                    <small class="error">Couldn't add reply. Contact Support Line.</small>
                                <?php } ?>
                            <?php } ?>
                            <button id="buttonMakeReply<?= $review->id_review ?>" class="makeReplyButton" onclick="toggleDisplayButton('buttonMakeReply<?= $review->id_review ?>', 'makeReplyForm<?= $review->id_review ?>', 'Reply to Review', 'Hide')">Reply to Review</button>
                            <form method="POST" id="makeReplyForm<?= $review->id_review ?>" class="makeReplyForm" action="../action/action_write_reply.php">
                                <input class="makeReviewComment" type="text" name="reply" placeholder="write your reply here">
                                <input style="display: none;" type="number" name="id_review" value="<?= $review->id_review ?>">
                                <button type="submit">Post Reply</button>
                            </form>
                        <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                
                <div class="makeReview">
                     <?php if (isset($_SESSION['id']) && $_SESSION['type'] === 'C' && !$alreadyHasReview) { ?>
                        <?php if (isset($_GET['error_review'])) { ?>
                            <?php if ($_GET['error_review'] === '1') { ?>   
                                <small class="error">You must be a client to make a review</small>
                            <?php } else if ($_GET['error_review'] === '2') { ?>
                                <small class="error">Your values are invalid</small>
                            <?php } else if ($_GET['error_review'] === '3') { ?>
                                <small class="error">You can only make one review per restaurant</small>
                            <?php } ?>
                        <?php } ?>
                        <button id="buttonMakeReview" onclick="toggleDisplayButton('buttonMakeReview', 'makeReviewForm', 'Make Review', 'Hide Review')">Make Review</button>
                        <form method="POST" id="makeReviewForm" action="../action/action_write_review.php">
                            <div>
                                <div>Rating: <input class="makeReviewNumber" type="number" name="rating" min="1" max="5" placeholder="1 to 5"></div>
                                <div>Price: <input class="makeReviewNumber" type="number" name="price" min="1" max="5" placeholder="1 to 5"></div>
                            </div>
                            <input class="makeReviewComment" type="text" name="comment" placeholder="write your comment here">
                            <button type="submit">Post Review</button>
                        </form>
                    <?php } ?>
                </div>
               
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



