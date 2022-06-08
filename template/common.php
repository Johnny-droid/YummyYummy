<?php function output_header() { ?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>YummiYummi</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/layout.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/layoutIndex.css" rel="stylesheet">
        <link href="../css/styleIndex.css" rel="stylesheet">
        <link href="../css/layoutRestaurant.css" rel="stylesheet">
        <link href="../css/styleRestaurant.css" rel="stylesheet">
        <link href="../css/layoutOrders.css" rel="stylesheet">
        <link href="../css/styleOrders.css" rel="stylesheet">
        <link href="../css/layoutProfile.css" rel="stylesheet">
        <link href="../css/styleProfile.css" rel="stylesheet">
        <link rel="icon" href="../images/Logo/YummyLogoTransparentBg.png">
        <script src="../javascript/searchRestaurant.js" defer></script>
        <script src="../javascript/makeOrder.js" defer></script>
        <script src="../javascript/toggleDisplayButton.js" defer></script>
        <script src="../javascript/profileChanges.js" defer></script>
        <script src="../javascript/colorsOrders.js" defer></script>
        <script src="../javascript/colorsOpenClose.js" defer></script>
        <script src="../javascript/dropdownHeader.js" defer></script>
    </head>

    <body>
        <header>
            <nav class="dropdown">
                <button onclick="showDropdownContent()" class="button" type="button">
                    <!--<img src="../images/Development/three-bars-icon.png" alt="dropdown">-->
                    ≡
                </button>
                
                <div id="myDropdown" class="dropdown-content">
                    <h1><a href="../index.php">HOME</a></h1>
                    <h1><a href="../pages/restaurants.php">RESTAURANTS</a></h1>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <h1><a href="../pages/orders.php">ORDERS</a></h1> 
                    <?php } ?>
                </div>
            </nav>
        
            <img src="../images/Logo/YummyLogoTransparentBg.png" alt="LogoYummyYellow">

            <nav class="default">
                <h1><a href="../index.php">HOME</a></h1>
                <h1><a href="../pages/restaurants.php">RESTAURANTS</a></h1>
                <?php if (isset($_SESSION['id'])) { ?>
                    <h1><a href="../pages/orders.php">ORDERS</a></h1> 
                <?php } ?>
            </nav>

            <signs>
                <?php if (!isset($_SESSION['id'])) { ?>
                    <h1><a href="../pages/login.php">SIGN IN</a></h1>
                    <h1><a href="../pages/signup.php">SIGN UP</a></h1>
                <?php } else { ?>
                    <h1><a href="../pages/profile.php">PROFILE</a></h1>
                    <h1><a href="../action/action_logout.php">LOG OUT</a></h1>
                <?php } ?>
                
            </signs>
        </header>

        <main>
<?php } ?>

<?php function output_footer() { ?>
        
        </main>

        <footer>
            <img src="../images/Logo/YummyLogoWhiteBlack.png" alt="LogoYummyWhite">

            <div class="textInfo">
                <h4> Made by: João Alves & José Araújo </h4>
                <h4> 📞 Contact Us: +351 933478958 </h4>
            </div>

            <img src="../images/Logo/FeupLogo.png" alt="Logo FEUP">
        </footer>
    </body>
</html>

<?php } ?>