<?php
    session_start();
    $servername = "localhost"; $username = "root"; $password = ""; $dbname = "n2s";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(isset($_POST["user2Remove"])){
        $userRemove = mysqli_real_escape_string($conn, $_POST["user2Remove"]);
        $sql = "DELETE FROM users WHERE userID = '{$userRemove}'";
        $result = mysqli_query($conn, $sql);
        header("Location: adminLoginPage.php");
    }
    else if(isset($_POST["product2Remove"])){
        $productRemove = mysqli_real_escape_string($conn, $_POST["product2Remove"]);
        $sql = "DELETE FROM products WHERE productID = '{$productRemove}'";
        $result = mysqli_query($conn, $sql);
        header("Location: adminLoginPage.php");
    }
    else if(isset($_POST["productName"])){
        $name = mysqli_real_escape_string($conn, $_POST["productName"]);
        $image = mysqli_real_escape_string($conn, $_POST["productImage"]); 
        $year = mysqli_real_escape_string($conn, $_POST["productYear"]);
        $price = mysqli_real_escape_string($conn, $_POST["productPrice"]);
        $details = mysqli_real_escape_string($conn, $_POST["productDescription"]);
        $sql = "INSERT INTO products (`productName`, `productURL`, `productYear`, `productPrice`, `productDetails`) VALUES ('{$name}', '{$image}', '{$year}', '{$price}', '{$details}')";
        $result = mysqli_query($conn, $sql);
        header("Location: adminLoginPage.php");
    }
    else if(isset($_POST["userfName"])){
        $fname = mysqli_real_escape_string($conn, $_POST["userfName"]);  
        $lname = mysqli_real_escape_string($conn, $_POST["userlName"]); 
        $email = mysqli_real_escape_string($conn, $_POST["usersEmail"]);
        $pass = mysqli_real_escape_string($conn, $_POST["userPassword"]);
        $sql = "INSERT INTO users (`firstName`, `lastName`, `email`, `password`) VALUES ('{$fname}', '{$lname}', '{$email}', '{$pass}')";
        $result = mysqli_query($conn, $sql);
        header("Location: adminLoginPage.php");
    }
    else if(isset($_POST["id"])){
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $pass = mysqli_real_escape_string($conn, $_POST["password"]);

        $sql = "SELECT adminID FROM `admin` WHERE adminID = '{$id}' AND `adminPassword` = '{$pass}'";
        $result = mysqli_query($conn, $sql);   
        $rows = $result->num_rows;
        $row = $result->fetch_assoc();
        
        if($rows == 1){
            $_SESSION["adminloggedIn"] = 1;
            header("Location: adminLoginPage.php");
        }
        else if ($rows != 1){
            $_SESSION["adminloggedIn"] = 2;
            header("Location: adminLoginPage.php");
        }
    }
    else if(isset($_POST["logout"])){
        unset($_SESSION["adminloggedIn"]);
        header("Location: adminLoginPage.php");
    }
    else if(isset($_POST["usersDetails"])){
        $id = mysqli_real_escape_string($conn, $_POST["usersDetails"]);
        $sql = "SELECT userID, `password` FROM users WHERE userID = '{$id}'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $_SESSION["pass"] = $row["password"];
        $_SESSION["selectedID"] = $row["userID"];
        header("Location: adminLoginPage.php");
    }
    else if(isset($_POST["adminChangePassword"])){
        $newPass = mysqli_real_escape_string($conn, $_POST["adminChangePassword"]);
        $currentID = $_POST["usersid"];
        $sql = "UPDATE users SET `password` = '{$newPass}' WHERE userID = '{$currentID}'";
        $result = mysqli_query($conn, $sql);
        unset($_SESSION["pass"]); 
        unset($_SESSION["selectedID"]);
        header("Location: adminLoginPage.php");
    }
?>