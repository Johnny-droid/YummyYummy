<?php function output_header() { ?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>YummiYummi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/layout.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/layoutIndex.css" rel="stylesheet">
        <link href="css/styleIndex.css" rel="stylesheet">

    </head>

    <body>
        <header>
            <img src="images/Logo/YummyLogoTransparentBg.png" alt="LogoYummyYellow">

            <nav>
                <h1><a href="index.php">HOME</a></h1>
                <h1><a href="restaurants.php">RESTAURANTS</a></h1>
                <h1><a href="orders.php">ORDERS</a></h1>
            </nav>

            <signs>
                <h1><a href="login.php">LOGIN</a></h1>
                <h1><a href="login.php">SIGN UP</a></h1>
            </signs>
        </header>

        <main>
<?php } ?>

<?php function output_footer() { ?>
        
        </main>

        <footer>
            <img src="images/Logo/YummyLogoWhiteBlack.png" alt="LogoYummyWhite">

            <h4> Made by: João Alves & José Araújo </h4>

            <img src="images/Logo/FeupLogo.png" alt="Logo FEUP">
        </footer>
    </body>
</html>

<?php } ?>