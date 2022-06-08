<?php function output_signup() { ?>
    <div class="loginDiv">
        <form class="formLogin" action="../action/action_signup.php" method="post">
            <h1>Sign up to<br> Yummy Yummy!</h1>
            <img src="../images/Logo/YummyLogoTransparentBg.png" alt="Logo"><br>
            <select id="accountType" name="accountType">
                <option value="client">Client</option>
                <option value="courier">Courier</option>
            </select>

            <input type="text" name="username" placeholder="username"> <br>
            <input type="password" name="password" placeholder="password"><br>
            <input type="number" name="age" placeholder="age"><br>
            <input type="text" name="address" placeholder="address"><br>
            <input type="text" name="phoneNumber" placeholder="phone number"><br>
            <input type="email" name="email" placeholder="email"><br>
            <input type="text" name="bio" placeholder="bio"><br>
            
            <button type="submit">Sign up</button><br>

            <?php if(isset($_GET['error'])) { 
                if ($_GET['error'] === '1') { ?>
                <small class="error">Username already used</small>
            <?php } else if ($_GET['error'] == '2') { ?>
                <small class="error">Could not save account to our database.<br>Contact support line.</small>
            <?php } else if ($_GET['error'] == '3') { ?>
                <small class="error">Something went wrong.<br>Contact support line.</small>
            <?php } else if ($_GET['error'] == '4') { ?>
                <small class="error">You need to be logged in!</small>
            <?php } ?>
        </form>
    </div>
<?php }} ?>