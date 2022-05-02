<?php function output_home_page(array $categories) { ?>

    <div class="imgSearch">
        <img id="banner" src="images/Banner/YummyBannerQuestion.png">

        <div class="searchBar">
            <input type="text" placeholder="Search...">
        </div>
    </div>
    
    <section id="categories">
        <?php foreach($categories as $category) { ?>
            
            <article class="category">
                <img src="images/Categories/Animated<?= str_replace(' ', '', $category->name)?>.jpg">
                <h3><?= $category->name ?></h3>
            </article>

        <?php } ?>
    </section>

<?php } ?>



