<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>N2S admin</title>
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
                </header>
                <div class="pageContent">
                <h4 id="wrong"></h4>

                    <div id="alterProducts" hidden>
                        <div id="deleteProducts">
                            <form action="adminChanges.php" method="POST">
                                <p>Delete A Product</p>
                                <select name="product2Remove">
                                    <?php 
                                        $servername = "localhost"; $username = "root"; $password = ""; $dbname = "n2s";
                                        // Create connection
                                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                                        $sql = "SELECT productID, productName FROM products";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = $result->fetch_array()){
                                            echo "<option value=". $row["productID"] .">". $row["productName"] ."</option> ";
                                        }
                                    ?>
                                </select><br>
                                <input type="submit" value="Delete Product"><br><br>
                            </form>
                        </div>
                        <div id="addProducts">
                            <form action="adminChanges.php" method="POST">
                                <p>Add A Product</p>
                                <input type="text" placeholder="Product Name" name="productName" required><br>
                                <input type="text" placeholder="Path To Product Image" name="productImage" required><br>
                                <input type="text" placeholder="Product Release Year" name="productYear" required><br>
                                <input type="text" placeholder="Product Price" name="productPrice" required><br>
                                <input type="text" placeholder="Product Description" name="productDescription" required><br>
                                <input type="submit" value="Add Product">
                            </form>
                        </div>
                    </div>

                    <div id="alterUsers" hidden>
                        <div id="removeUsers">
                            <form action="adminChanges.php" method="POST">
                            <p>Delete A User</p>
                                <select name="user2Remove">
                                    <?php 
                                        $servername = "localhost"; $username = "root"; $password = ""; $dbname = "n2s";
                                        // Create connection
                                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                                        $sql = "SELECT userID, email FROM users";
                                        $result = mysqli_query($conn, $sql);
                                        while($row = $result->fetch_array()){
                                            echo "<option value=". $row["userID"] .">". $row["email"] ."</option> ";
                                        }
                                    ?>
                                </select>
                                <input type="submit" value="Delete User">

                            </form>
                        </div>
                        <div id="addUsers">
                            <form action="adminChanges.php" method="POST">
                                <p>Add A User</p>
                                <input type="text" placeholder="Users First Name" name="userfName" pattern="[a-zA-Z]{2,10}" required>
                                <input type="text" placeholder="Users Last Name" name="userlName" pattern="[a-zA-Z]{2,10}" required>
                                <input type="email" placeholder="Users Email" name="usersEmail" required>
                                <input type="password" placeholder="Users Password" name="userPassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" required>
                                <input type="submit" value="Add User">
                            </form>
                        </div>
                        <form action="adminChanges.php" method="POST">
                            <input type="text" value="logout" name="logout" hidden>
                            <input type="submit" value="Log Out">
                        </form>
                    </div>
                    <div id="usersDetails" hidden>
                        <?php
                            $servername = "localhost"; $username = "root"; $password = ""; $dbname = "n2s";
                            // Create connection
                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                            $sql = "SELECT userID, `password`, email FROM users";
                            $result = mysqli_query($conn, $sql);
                            echo "<div id='formDiv'><form action='adminChanges.php' method='POST'><p>Users Details</p><select id='selectDetails' name='usersDetails'>";
                            while($row = $result->fetch_array()){
                                echo "<option value=". $row["userID"] .">". $row["email"] ."</option> ";
                            }
                            echo "</select><input type='submit' value='Find Password'></form></div>";
                        ?>
                        <div id="passwordChange" hidden>
                            <form action="adminChanges.php" method="POST">
                                <input type="text" name="usersid" id="usersid" hidden>
                                <input type="text" placeholder="Password" id="passChangeInput" name="adminChangePassword">
                                <input type="submit" value="Change Password">
                            </form>
                        </div>
                    </div>

                    <div id="signinDiv">
                        <form action="adminChanges.php" method="POST">
                            <p>Admin ID:</p><br>
                            <input type="text" placeholder="e.g. 1" name="id" required><br>
                            <p>Password:</p><br>
                            <input type="password" placeholder="e.g. password" name="password" required><br>
                            <input type="submit" value="Login">
                        </form>
                        <a href="profile.php" style="padding-bottom: 10px;">User Login</a>
                    </div>  
                </div>
            </div>   
        </div>
        <script src="js/index.js"></script>
        <?php
            if(isset($_SESSION["adminloggedIn"]) && $_SESSION["adminloggedIn"] == 1){
                echo "<script>document.getElementById('signinDiv').style.display = 'none';
                document.getElementById('alterProducts').style.display = 'block';
                document.getElementById('alterUsers').style.display = 'block';
                document.getElementById('usersDetails').style.display= 'block';</script>";
            }
            else if(isset($_SESSION["adminloggedIn"]) && $_SESSION["adminloggedIn"] == false){
                echo "<script>document.getElementById('wrong').innerHTML = 'Incorrect Credentials'</script>";
            }
            
            if(isset($_SESSION["pass"])){
                echo "<script>document.getElementById('passwordChange').style.display = 'block';
                document.getElementById('passChangeInput').value = '". $_SESSION["pass"] ."';
                document.getElementById('formDiv').style.display = 'none';
                document.getElementById('usersid').value = '". $_SESSION["selectedID"] . "';</script>";
            }
        ?>
    </body>
</html>