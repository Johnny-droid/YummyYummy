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
            <!-- <span class="material-symbols-outlined">edit</span> -->
            <h1>@<?= $user->name ?></h1>
            <div id="ageDiv1" class="itemProfile1"><div>Age: <?= $user->age ?></div><button class="itemProfileButtonEdit" id="age" value="<?= $user->age ?>"><span class="material-symbols-outlined">edit</span></button></div>
            <div id="addressDiv1" class="itemProfile1"><div>Address: <?= $user->address ?></div><button class="itemProfileButtonEdit" id="address" value="<?= $user->address ?>"><span class="material-symbols-outlined">edit</span></button></div>
            <div id="phoneNumberDiv1" class="itemProfile1"><div>Phone Number: <?= $user->phoneNumber ?></div><button class="itemProfileButtonEdit" id="phoneNumber" value="<?= $user->phone_number ?>"><span class="material-symbols-outlined">edit</span></button></div>
            <div id="emailDiv1"class="itemProfile1"><div>Email: <?= $user->email ?></div><button class="itemProfileButtonEdit" id="email" value="<?= $user->email ?>"><span class="material-symbols-outlined">edit</span></button></div>
            <div id="bioDiv1" class="itemProfile1"><div>Bio: <?= $user->bio ?></div><button class="itemProfileButtonEdit" id="bio" value="<?= $user->bio ?>"><span class="material-symbols-outlined">edit</span></button></div>
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