<?php function output_restaurants(?array $restaurants, ?Category $category) { ?>
    <div class="restaurantsGlobal">

        <?php if ($category) { ?>
        <div class="categoryBigImageContainer">
            <h1><?= $category->name ?></h1>
            <img class="categoryBigImage" src="../images/Categories/Animated<?= str_replace(' ', '', $category->name) ?>.jpg">
        </div>
            
        <?php } ?>

        <section id="restaurantsSearch">

            <?php foreach ($restaurants as $restaurant) { ?>
                <article class="restaurantSearch">
                    <img src="../images/Restaurants/Restaurant<?= $restaurant->id ?>.jpg" alt="<?= $restaurant->name ?>">
                    <div>
                        <a href="../pages/restaurant.php?id=<?= $restaurant->id ?>"><?= $restaurant->name ?></a>
                    </div>
                </article>
            <?php  }  ?>

        </section>
    </div>

<?php } ?>