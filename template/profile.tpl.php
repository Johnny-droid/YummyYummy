<?php function output_profile(User $user, $favouriteRestaurants) { ?>
    <div class="pic">
        <label class="-label" for="file">
            <span>Change Image</span>
        </label>
        <input id="file" type="file" onchange="loadFile(event)"/>
        <img src="../images/Artworks/Profile Pictures/profile1.png" alt="Avatar" class="avatar">
    </div>

    <div class="profiling">
        
        <h1>@<?= $user->name ?></h1><br>
        <strong>Age: <?= $user->age ?></strong><br>
        <strong>Address: <?= $user->address ?></strong><br>
        <strong>Phone Number: <?= $user->phoneNumber ?></strong><br>
        <strong>Email: <?= $user->email ?></strong><br>
        <strong>Bio: <?= $user->bio ?></strong><br>
        <?php
            if ($favouriteRestaurants) {
                
            }
        ?>
    </div>
        
<?php } ?>