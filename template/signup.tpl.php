<?php function output_signup() { ?>
    <div class="loginDiv">
        <form class="formLogin" action="../action/action_signup.php" method="post">
            <h1>Sign up to<br> Yummy Yummy!</h1>
            <img src="../images/Logo/YummyLogoTransparentBg.png" alt="Logo"><br>
            <input type="text" name="username" placeholder="username"> <br>
            <input type="password" name="password" placeholder="password"><br>
            <input type="text" name="address" placeholder="address"><br>
            <input type="text" name="phoneNumber" placeholder="phone number"><br>
            <button type="submit">Sign up</button><br>

            <?php if ($_GET['error'] === '1') { ?>
                <small>Username already used</small>
            <?php } else if ($_GET['error'] == '2') { ?>
                <small>Could not save account to our database.<br>Contact support line.</small>
            <?php } else if ($_GET['error'] == '3') { ?>
                <small>Something went wrong.<br>Contact support line.</small>
            <?php } ?>
        </form>
    </div>
<?php } ?>