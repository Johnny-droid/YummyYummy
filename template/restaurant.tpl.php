<?php function output_restaurant(Restaurant $restaurant) { ?>
    
    <section class="restaurantGlobal">
        <img class="restaurantImage" src="images/Restaurants/restaurant<?= $restaurant->id ?>.jpg">
        
        
        <div class="restaurantMainInformation">
            
            <h1><?= $restaurant->name?></h1>
            <h4>Rating: 4.5  Still not valid</h4>
            <h4>Price: € €   Still not valid</h4>
            <h4>Open         Still not Valid</h4>

        </div>
    </section>
        

<?php } ?>