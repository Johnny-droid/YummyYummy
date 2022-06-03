<?php function output_restaurants(array $restaurants) { ?>
    
    <section id="restaurantsSearch">

        <?php foreach ($restaurants as $restaurant) { ?>
            <article class="restaurantSearch">
                <img src="images/Restaurants/Restaurant<?= $restaurant->id ?>.jpg" alt="<?= $restaurant->name ?>">
                <div>
                    <a href="restaurant.php?id=<?= $restaurant->id ?>"><?= $restaurant->name ?></a>
                </div>
            </article>
        <?php  }  ?>

    </section>
<?php } ?>
