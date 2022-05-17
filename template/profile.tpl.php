<?php function output_profile(User $user) { ?>
    <div class="pic">
        <img src="../images/Artworks/Profile Pictures/profile1.png" alt="Avatar" class="avatar">
    </div>

    <div class="profiling">
        
        <h1>@<?= $user->name ?></h1><br>
        <strong>Age: <?= $user->age ?></strong><br>
        <strong>Address: <?= $user->address ?></strong><br>
        <strong>Phone Number: <?= $user->phoneNumber ?></strong><br>
        <strong>Email: <?= $user->email ?></strong><br>
        <strong>Bio: <?= $user->bio ?></strong><br>
    </div>
        
<?php } ?>