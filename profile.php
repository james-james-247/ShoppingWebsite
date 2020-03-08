<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>N2S login</title>
        <!--Title of my web page-->
        <link rel="stylesheet" href="css/index.css">
        <!--This is my desktop style sheet-->
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    </head>
    <body>
        <div class = "page">
            <div class = "page-wrapper">
                <header>
                    <h3 class="pageTitle">N2S</h3>
                    <img src="Photos/icon.png" class="pageIcon">
                    <img src="Photos/profile.png" class="profileLogo" id="profileLogo">
                    <img src="Photos/shoppingCart.png" class="shoppingCartIcon" id="cart"><br>
                    <div class="navbar">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="signupPage.php">Sign Up</a></li>
                            <li><a href="data.php">Products</a></li>
                            <li><a href="slideshow.php">Photos</a></li>
                            <li><a href="report.php">Report</a></li>
                        </ul>
                    </div>
                </header>
                <div class="pageContent">
                    <h1 id="loginRequest">You Must Sign In Before You Can <br> Use Our Service</h1>
                    <p id="miniLoginRequest">Make sure you've signed up already</p>
                        <div id='userDetails' hidden>
                            <form action="userChange.php" method="POST">
                                <input type="text" value=<?php echo $_SESSION["userID"]; ?> name="userID" hidden>
                                <p>First Name:</p>
                                <input type='text' id='firstNameDetails' value=<?php echo $_SESSION["firstName"];?> name='changefName' pattern="[a-zA-Z]{2,10}" required>
                                <p>Last Name:</p>
                                <input type='text' id='lastNameDetails' value=<?php echo $_SESSION["lastName"];?> name='changelName' pattern="[a-zA-Z]{2,10}" required>
                                <p>Email:</p>
                                <input type='email' id='emailDetails' value=<?php echo $_SESSION["email"];?> name='changeEmail' reuired>
                                <input type='submit' value='Change Details'>
                            </form><br>
                            <form action="userChange.php" method="POST">
                                <input type="text" value="logout" name="logout" hidden>
                                <input type="submit" value="Log Out">
                            </form>
                            <input type="submit" value="Help" id="helpButton" style="width: 100px">
                            <div id="helpInfo" hidden style="margin-bottom: 30px;">
                                <h3>Commonly Asked FAQ's:</h3>
                                <h4>Why Do We Need An Email Address?</h4>
                                <p>So that we can get into contact with you</p>
                                <h4>Where are you based?</h4>
                                <p>The United Kingdom</p>
                                <h4>How Do I Buy A Product?</h4>
                                <p>Go to the products page, click add to basket, then go to your basket and click buy</p>
                            </div>
                        </div>
                    <div id="signinDiv">
                        <form action="userChange.php" method="POST">
                            <p>Email:</p><br>
                            <input type="email" placeholder="e.g. email@email.com" name="email" required><br>
                            <p>Password:</p><br>
                            <input type="password" placeholder="e.g. password" name="password" required><br>
                            <input type="submit" value="Login">
                        </form>
                        <a href="adminLoginPage.php">Administrator Login</a>
                    </div>  
                </div>
            </div>   
        </div>
        <script src="js/index.js"></script>
        <?php
            if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
                echo "<script>document.getElementById('signinDiv').style.display = 'none';
                document.getElementById('userDetails').style.display = 'block';
                document.getElementById('miniLoginRequest').style.display = 'none'; 
                document.getElementById('loginRequest').innerHTML = 'Congrats! You are logged in';</script>";
            }
        ?>
    </body>
</html>