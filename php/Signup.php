<head>
    <title>Blu-ray Movies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/signup.css">
    <link rel="shortcut icon" type="image/png" href="../img/favicon.png">
</head>

<body>

    <div id="header">
        <a href="Homepage.php">
            <img src="../img/Blu-raymovies.png" height="70" id="storeName" />
        </a>
        <div class="search-container">
            <form action="SearchResults.php" method="post">
                <input id="search" type="text" placeholder="Search by title" name="search">
                <button type="submit">Search<i class="fa fa-search"></i></button>
            </form>
        </div>
        <div id="navbar">
            <ul>
                <li><a href="Homepage.php">Home</a></li>              
                <?php
                    session_start();
                    if (!isset($_SESSION['loggedIn'])) { ?>
                        <li><a href="Login.php">Login</a></li>
                    <?php } else { ?>
                        <li><a href="Checkout.php">Cart</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    <?php } 
                    if (isset($_SESSION['admin'])) {
                    ?>
                        <li><a href="modifyMovies.php">Modify Movies</a></li>
                    <?php }?>
            </ul>       
        </div>

    </div>

    <div class="signup-form">
        <h2>Sign Up</h2>
        <script src="../js/SignUp.js"></script>
        <form name="registration" onsubmit="return validateForm()" action="register.php" method="post" id="registration">
            <div class="row">
                <div class="column">
                    <input type="text" name="fullname" placeholder="Full Name" required><br>
                    <input type="email" name="email" placeholder="Email" required><br>
                    <input type="password" name="pwd" placeholder="Password" required><br>
                </div>
                <div class="column">
                    <input type="text" name="phone" placeholder="Phone Number" required pattern='^(\d{3}[- ]?){2}\d{4}$' title='10 digits (ex: xxx xxx xxxx)'><br>
                    <input type="email" name="confemail" placeholder="Confirm Email" required><br>
                    <input type="password" name="confpwd" placeholder="Confirm Password" required><br>
                </div>
            </div>

            <h2>Shipping Info</h2>
            <div class="row">
                <div class="column">
                    <input type="text" name="address" placeholder="Address Line" required><br>
                    <input type="text" name="city" placeholder="City" required><br>
                </div>
                <div class="column">
                    <input type="text" name="state" placeholder="State" required><br>
                    <input type="text" name="zip" placeholder="Zip/Postal Code" required pattern='^\d{5}([- ]?\d{4})?$' title="Zip code must be xxxxx or xxxxx-xxxx">
                    <br>
                </div>
            </div>

            <h2>Payment Info</h2>
            <div class="row">
                <div class="column">
                    <input type="text" name="cardNum" placeholder="Card Number" required pattern='^(\d{4}[- ]?){3}\d{4}$' 
                        title="Card number must be 16 digits"><br>
                    <input type="text" name="nameOnCard" placeholder="Name on Card" required='^[\d]+' title="Name cannot contain numbers"><br>
                </div>
                <div class="column">
                    <input type="text" name="expDate" placeholder="Exp. Date" required pattern='^((0[1-9])|(10)|(11)|(12))[\/ \\]\d{2}$' title="Date must be month and year. (ex: 12/20)"><br>
                    <input type="text" name="secCode" placeholder="Security Code" required pattern='^\d{3,4}$' title="Security code must be 3 or 4 digits"><br>
                </div>
            </div>
            <p class="red"><?php if(!empty($signupErrorMsg)) echo $signupErrorMsg; ?></p>
            <div class="row">
                <div class="column">
                    <button type="submit" name="submit" class="orderButton">Submit</button>
                </div>
            </div>
        </form>
        <h4>Already Have an Account?</h4>
        <a href="Login.php">
            <button type="submit" name="submit" class="orderButton">Log In</button>
        </a>
    </div>

</body>