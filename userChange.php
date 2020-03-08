<?php 
    session_start();
    $servername = "localhost"; $username = "root"; $password = ""; $dbname = "n2s";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(isset($_POST["email"])){ //Used to login
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $pass = mysqli_real_escape_string($conn, $_POST["password"]);
        $sql = "SELECT userID, firstName, lastName, email FROM users WHERE email = '{$email}' AND `password` = '{$pass}'";
        $result = mysqli_query($conn, $sql);   
        $rows = $result->num_rows;
        $row = $result->fetch_assoc();
        
        if($rows == 1){
            $_SESSION["loggedIn"] = true;
            $_SESSION["userID"] = $row["userID"];
            $_SESSION["firstName"] = $row["firstName"];
            $_SESSION["lastName"] = $row["lastName"];
            $_SESSION["email"] = $row["email"];
            header("Location: index.php");
        }
        else if ($rows != 1){
            $_SESSION["loggedIn"] = false;
            header("Location: index.php");
        }
    }
    else if(isset($_POST["changefName"])){
        $id = mysqli_real_escape_string($conn, $_POST["userID"]);
        $firstName = mysqli_real_escape_string($conn, $_POST["changefName"]);
        $lastName = mysqli_real_escape_string($conn, $_POST["changelName"]);
        $email = mysqli_real_escape_string($conn, $_POST["changeEmail"]);

        $sql = "UPDATE users
                SET firstName = '{$firstName}',
                lastName = '{$lastName}',
                email = '{$email}'
                WHERE userID = '{$id}'";
        $result = mysqli_query($conn, $sql); 

        if($result == true){
            $sql = "SELECT userID, firstName, lastName, email FROM users WHERE userID = '{$id}'";
            $result2 = mysqli_query($conn, $sql);   
            $row = $result2->fetch_assoc();
            $_SESSION["userID"] = $row["userID"];
            $_SESSION["firstName"] = $row["firstName"];
            $_SESSION["lastName"] = $row["lastName"];
            $_SESSION["email"] = $row["email"];
            header("Location: profile.php");
        }
    }
    else if(isset($_POST["productName"])){
        $product = mysqli_real_escape_string($conn, $_POST["productName"]);
        $sql = "SELECT productPrice, productName FROM products WHERE productID = {$product}";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        
        if(!isset($_SESSION["basketItem"])){
            $_SESSION["basketItem"] = array();
            $_SESSION["basketPrice"] = array();
        }
        
        array_push($_SESSION["basketItem"], $row["productName"]);
        array_push($_SESSION["basketPrice"], $row["productPrice"]);

        header("Location: cart.php");
    }
    else if(isset($_POST["price"])){
        $price = $_POST["price"];
        unset($_SESSION["basketItem"]);
        unset($_SESSION["basketPrice"]);   
        unset($_SESSION["purchase"]); 
        
        if($price == ""){
            $_SESSION["purchase"] = false;
            header("Location: cart.php");
        }
        else if (!$price == ""){
            $_SESSION["purchase"] = true;
            header("Location: cart.php");
        }
    }
    else if(isset($_POST["firstName"])){
        echo "<script>alert('here')</script>";
        $firstName = mysqli_real_escape_string($conn,$_POST["firstName"]);
        $lastName = mysqli_real_escape_string($conn,$_POST["lastName"]);
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $password = mysqli_real_escape_string($conn,$_POST["confirmPassword"]);

        $sql = "SELECT userID FROM users WHERE email = '{$email}'";
        $result = mysqli_query($conn, $sql);
        $rows = $result->num_rows;

        if($rows == 0){
            $sql = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`) VALUES ('{$firstName}', '{$lastName}', '{$email}', '{$password}')";
            $result = mysqli_query($conn, $sql);
            $_SESSION["created"] = true;
            header("Location: profile.php");
        }
        else{
            $_SESSION["created"] = false;
            header("Location: signupPage.php");
        }
    }
    else if(isset($_POST["logout"])){
        unset($_SESSION["loggedIn"]);
        header("Location: profile.php");
    }
    else if(isset($_POST["empty"])){
        unset($_SESSION["basketItem"]);
        unset($_SESSION["basketPrice"]);
        header("Location: cart.php");
    }
?>