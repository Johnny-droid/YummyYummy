<?php function output_login() { ?>
    <div class="loginDiv">
        <form class="formLogin" action="../action/action_login.php" method="post">
            <h1>Log in to<br> Yummy Yummy!</h1>
            <img src="../images/Logo/YummyLogoTransparentBg.png" alt="Logo"><br>
            <input type="text" name="username" placeholder="username"> <br>
            <input type="password" name="password" placeholder="password"><br>
            <button type="submit">Sign in</button>
        </form>
    </div>
<?php } ?>



