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
        <title>N2S report</title>
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
                            <li><a href="report.php" style="color: #40E0D0">Report</a></li>
                        </ul>
                    </div>
                </header>
                <div class="pageOpening">
                    <img src="Photos/reportBackground.png" class="pageMainImage">
                    <h1 class="pageMainText">Enjoy A Detailed<br>Breakdown Below</h1>
                </div>
                <div class="pageContent">
                    <h3>Below Is How I Created This Site:</h3>
                    <p>Broken down into a step-by-step guide!</p>
                    <div id="reportPage">
                        <?php
                            $document = fopen("Extra/documentation.txt", "r") or die("Unable to open file!");
                            while(!feof($document)) { //While not the end of the file
                            echo fgets($document) . "<br>";
                            }
                            fclose($document);
                        ?>
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