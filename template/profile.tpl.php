<?php function output_profile(User $user) { ?>
    <div>
        <h1><?= $user->name ?></h1><br>
        <strong>Address: <?= $user->address ?></strong><br>
        <strong>Phone Number: <?= $user->phoneNumber ?></strong>


    </div>
        
<?php } ?>