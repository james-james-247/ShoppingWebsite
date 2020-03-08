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
        <title>N2S</title>
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
                    <?php
                        $servername = "localhost"; $username = "root"; $password = ""; $dbname = "n2s";
                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        $chosenID = $_GET["id"];
                        $sql = "SELECT productID, productName, productURL, productYear, productPrice, productDetails FROM products WHERE productID = '{$chosenID}'";
                        $result = mysqli_query($conn, $sql);
                        //Weve now created a loop that will run as many times as there are products in the database 
                        echo "<div id='innerContentDiv' style='padding-bottom: 20px'>";
                        while($row = $result->fetch_array()){
                                echo "<form action='userChange.php' method='POST'>";
                                echo "<h1 id='productTitle'>". $row["productName"] ."</h1>";
                                echo "<h5 id='productYear'>". $row["productYear"] ."</h5>";
                                echo "<p id='productPrice'>£". $row["productPrice"] ."</p>";
                                echo "<img src=". $row["productURL"] ." id='productImage' width=600px height=500px>";
                                echo "<p id='productDescription' width='20%'>" . $row["productDetails"] . "</p>";
                                echo "<input type='text' value=". $row["productID"] ." name='productName' hidden>";
                                echo "<input type='submit' value='Add To Basket' id='productSubmit'>";
                                echo "</form>";
                        }
                        echo "</div>";
                        mysqli_close($conn);
                    ?>
                </div>
            </div>     
            <div class="pagesFooter">
                <p class="footerTitle">Thank you for visiting our site.<br>The copyright is owned exclusively by:<br>North to South Technologies LTD &copy; 2020<br>James Smith (N0817034)</p>
            </div>
        </div>
        <script src="js/index.js"></script>
    </body>
</html>