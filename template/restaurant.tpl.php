<?php function output_restaurant(Restaurant $restaurant, array $categories, array $reviews) { ?>
    
    <section class="restaurantGlobal">
        <img class="restaurantImage" src="images/Restaurants/restaurant<?= $restaurant->id ?>.jpg">
        
        
        <div class="restaurantMainInformation">
            
            <h1><?= $restaurant->name?></h1>
            <p>Rating: <?= Review::getAverageRating($reviews) ?></p>
            <p>Price:  <?= Review::getAveragePriceSymbols($reviews)?></p>
            <p><?= $restaurant->getOpenOrClosed() ?></p>

        </div>

        <div class="restaurantExtraInformation">

            <h2>Information</h2>
            <ul>
                <?php foreach($categories as $category) {   ?>
                    <li><?= $category->name ?></li>
                <?php } ?>
            </ul>

            <p>Phone Number: <?= $restaurant->phoneNumber?> </p>
            <p>Location: <?= $restaurant->location ?></p>

        </div>

        <section class="reviews">
            <h2>Reviews</h2>

            <?php foreach($reviews as $review) { ?>

                <article class="review">
                    
                    <h5><?= $review->username ?></h5>
                    <div class="reviewRating"><?= $review->rating ?></div>
                    <div class="reviewPrice"><?= $review->priceScore ?></div>
                    <p><?= $review->comment ?></p>
                
                <article>
            <?php } ?>

        </section>

    </section>
        

<?php } ?>