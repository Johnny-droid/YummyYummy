<?php function output_profile(User $user) { ?>
    <div>
        <h1><?= $user->name ?></h1><br>
        <strong>Age: <?= $user->age ?></strong><br>
        <strong>Address: <?= $user->address ?></strong><br>
        <strong>Phone Number: <?= $user->phoneNumber ?></strong><br>
        <strong>Email: <?= $user->email ?></strong><br>
        <strong>Bio: <?= $user->bio ?></strong><br>
    </div>
        
<?php } ?>