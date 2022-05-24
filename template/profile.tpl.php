<?php function output_profile(User $user, $favouriteRestaurants) { ?>
    <div class="profile">
        <div class="pic">
            <label class="-label" for="file">
                <span>Change Image</span>
            </label>
            <input id="file" type="file" onchange="loadFile(event)" />
            <img src="../images/Artworks/Profile Pictures/profile1.png" alt="Avatar" class="avatar">
        </div>

        <div class="profiling">

            <h1>@<?= $user->name ?></h1>
            <div class="itemProfile">Age: <?= $user->age ?></div>
            <div class="itemProfile">Address: <?= $user->address ?></div>
            <div class="itemProfile">Phone Number: <?= $user->phoneNumber ?></div>
            <div class="itemProfile">Email: <?= $user->email ?></div>
            <div class="itemProfile">Bio: <?= $user->bio ?></div>
            <div class="favourites">
                <?php
                if ($favouriteRestaurants) { ?>
                    <h3 id="headingers">Favourite Restaurants </h3>
                    <?php foreach ($favouriteRestaurants as $restaurant) { ?>
                        <div class="itemProfile"><?= $restaurant->name ?></div>
                <?php }
                } ?>
            </div>
        </div>

    </div>



<?php } ?>