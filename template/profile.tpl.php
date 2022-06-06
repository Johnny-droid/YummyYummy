<?php function output_profile(User $user, array $restaurants) { ?>
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
                <?php if ($restaurants) { ?>
                    <?php if ($user->type === 'C') { ?> 
                        <h3 id="headingers">Favourite Restaurants </h3>
                    <?php } else if ($user->type === 'O') { ?>
                        <h3 id="headingers">Restaurants Owned</h3>
                    <?php }; ?>
                    <?php foreach ($restaurants as $restaurant) { ?>
                        <div class="itemProfile"><a href="restaurant.php?id=<?= $restaurant->id ?>"><?= $restaurant->name ?></a></div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>

    </div>



<?php } ?>