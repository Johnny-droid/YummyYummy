<?php function output_restaurant(Restaurant $restaurant, array $reviews) { ?>
    
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
                <li>Category1 Not valid</li>
                <li>Category2 Not valid</li>
                <li>Category3 Not valid</li>

            </ul>

            <p>Phone Number: <?= $restaurant->phoneNumber?> </p>
            <p>Location: <?= $restaurant->location ?></p>

        </div>

        <section class="reviews">
            <h2>Reviews</h2>

            <article class="review">
                
                <h5>Marcelo</h5>
                <div class="reviewRating"> Rating here </div>
                <div class="reviewPrice"> Price here </div>
                <p>Somerandom comment asovpd\soncoancancpacnododoabodavbad</p>
            
            <article>

        </section>

    </section>
        

<?php } ?>