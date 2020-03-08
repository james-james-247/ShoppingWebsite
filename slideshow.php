<?php
    session_start();
    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == false){
        header("Location: profile.php");
    }
    else if(!isset($_SESSION["loggedIn"])){
        header("Location: profile.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>N2S images</title>
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
                            <li><a href="slideshow.php" style="color: #40E0D0">Photos</a></li>
                            <li><a href="report.php">Report</a></li>
                        </ul>
                    </div>
                </header>
                <div class="pageOpening">
                    <img src="Photos/slideshowBackground.jpg" class="pageMainImage">
                    <h1 class="pageMainText">Always Advanced & <br> Always Beautiful!<br>Never Less!</h1>
                </div>
                <div class="pageContent">
                    <h3>Below Are Some Images Of Our Products:</h3>
                    <p>If you like the look of any, head over to the products page to purchase!</p>
                    <div id="thumbnails">
                        <div class="thumbImages" id="image0" style="border-bottom: 2px solid black">
                            <img src="Photos/slideshow-image1.jpg">
                        </div>
                        <div class="thumbImages" id="image1">
                            <img src="Photos/slideshow-image2.jpg">
                        </div>
                        <div class="thumbImages" id="image2">
                            <img src="Photos/slideshow-image3.jpg">
                        </div>
                    </div>
                    <div id="slideshowLocation">
                        <input type="button" id="backButton" value="Back">
                        <input type="button" id="nextButton" value="Next">
                        <img src="Photos/slideshow-image1.jpg" id="slideshowImage">
                        <p id="slideshowText">N2S Phone 1</p>                
                    </div>
                </div>
            </div>
            <div class="pagesFooter">
                <p class="footerTitle">Thank you for visiting our site.<br>The copyright is owned exclusively by:<br>North to South Technologies LTD &copy; 2020<br>James Smith (N0817034)</p>
            </div>
        </div>
        <script src="js/index.js"></script>
    </body>
</html>