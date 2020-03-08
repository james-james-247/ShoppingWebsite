<!DOCTYPE html>
<html>
    <head>
        <title>N2S signup</title>
        <!--Title of my web page-->
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/phone.css" media="screen and (max-width: 800px)">
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
                            <li><a href="signupPage.php" style="color: #40E0D0">Sign Up</a></li>
                            <li><a href="data.php">Products</a></li>
                            <li><a href="slideshow.php">Photos</a></li>
                            <li><a href="report.php">Report</a></li>
                        </ul>
                    </div>
                </header>
                <div class="pageOpening">
                    <img src="Photos/signupBackground.jpg" class="pageMainImage">
                    <h1 class="pageMainText">Thank You<br>For Joining Our<br>Growing Club</h1>
                </div>
                <div class="pageContent">
                    <h3 id="signTitle">Below Is Our Sign Up Form:</h3>
                    <form action="signup.php" method="POST">
                        <div id="signupForm">
                            <p>This Account Will Be Yours Forever!</p><br>

                            <p id="firstNameP">Your Firstname:</p>
                            <p id="lastNameP">Your Lastname:</p><br>

                            <input type="text" placeholder="e.g. 'John'" class="textInput" id="fName" name="firstName" pattern="[a-zA-Z]{2,10}" required>
                            <input type="text" placeholder="e.g. 'Doe'" class="textInput" id="lName" name="lastName" pattern="[a-zA-Z]{2,10}" required><br>

                            <p id="emailP">Your Email:</p>
                            <input type="email" placeholder="e.g. 'fakeemail@notreal.com'" class="textInput" id="email" name="email" required>
                            

                            <p id="passwordP">Your Password:</p>
                            <p id="passwordHelp">Must have an uppercase, lowercase and a number</p>
                            <input type="password" placeholder="e.g. 'Password123'" class="textInput" id="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>

                            <p id="confirmP">Confirm Your Password:</p>
                            <input type="password" placeholder="e.g. 'Password123'" class="textInput" name="confirmPassword" id="confirmPassword" required>

                            <input type="checkbox" id="checkbox" required>
                            <p id="checkboxP">Confirm you have read out T&C's</p>

                            <p id="submitP" style="margin-bottom: 20px;">Match passwords to reveal button:</p>
                            <input type="submit" value="Create Account" class="submitButton" disabled>
                        </div>
                    </form>
                </div>
            </div>
            <div class="pagesFooter">
                <p class="footerTitle">Thank you for visiting our site.<br>The copyright is owned exclusively by:<br>North to South Technologies LTD &copy; 2020<br>James Smith (N0817034)</p>
            </div>
        </div>
        <script src="js/index.js"></script>
        <?php
            if(isset($_SESSION["created"]) && $_SESSION["created"] == true){
                echo "<script>document.getElementById('signupForm').disabled = true;</script>";
            }
            else if (isset($_SESSION["created"]) && $_SESSION["created"] == false){
                echo "<script>document.getElementById('signTitle').innerHTML = 'Account with email already exists';</script>";
            }
        ?>
    </body>
</html>