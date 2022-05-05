<?php function output_home_page(array $categories) { ?>

    <div id="imgSearch">
        <img id="banner" src="images/Banner/YummyBannerQuestion.png">

        <div id="searchBar"> <!-- This will probably change to a form -->
            <input id="inputSearch" type="text" placeholder="Search...">
        </div>
    </div>
    
    <section id="restaurantsSearch">

    </section>

    <section id="categories">
        <?php foreach($categories as $category) { ?>
            
            <article class="category">
                <img src="images/Categories/Animated<?= str_replace(' ', '', $category->name)?>.jpg">
                <h3><?= $category->name ?></h3>
            </article>

        <?php } ?>
    </section>

<?php } ?>



