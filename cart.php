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
        <title>N2S basket</title>
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
                    <img src="Photos/shoppingCart.png" class="shoppingCartIcon"><br>
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
                    <h3>Below Is Your Current Cart</h3>
                    <p>Feel free to add more!</p>
                    <div id="cartDiv">
                        <form action="userChange.php" method="POST">
                            <p>Current items in your basket:</p>
                            <p id="currentNumber" style="font-size: 25px; ">Nothing So Far!</p>
                            <p id="total">Total: £0</p>
                            <input id="totalInput" name="price" hidden>
                            <input type="submit" value="Buy">
                        </form>
                        <form action="userChange.php" method="POST">
                            <input type="text" value="empty" name="empty" hidden>
                            <input type="submit" value="Empty Basket">
                        </form>
                    </div>
                </div>
            </div>   
        </div>
        <script src="js/index.js"></script>
        <?php
            if(isset($_SESSION["purchase"])){
                if($_SESSION["purchase"] == true){
                    echo "<script>document.getElementById('total').innerHTML = 'Purchase Completed'</script>";
                }
                else{
                    echo "<script>document.getElementById('total').innerHTML = 'Please Add Something To You Cart First'</script>";
                }
            }
            unset($_SESSION["purchase"]);
            if(isset($_SESSION["basketPrice"]) && isset($_SESSION["basketItem"])){
                $basketSize = sizeof($_SESSION["basketItem"]);
                $total = 0;
                $products = "";
                for($i = 0; $i < $basketSize; $i++){
                    $total += $_SESSION["basketPrice"][$i];
                    $products .= $_SESSION["basketItem"][$i] . "<br>";
                }
                echo "<script>document.getElementById('total').innerHTML = 'Current Total: £". $total ."'; document.getElementById('currentNumber').innerHTML = '". $products . "'; document.getElementById('totalInput').value = ". $total .";</script>";
            }
        ?>
    </body>
</html>