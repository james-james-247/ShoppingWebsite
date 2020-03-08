<?php
    $servername = "localhost"; $username = "root"; $password = ""; $dbname = "n2s";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["confirmPassword"];

    $sql = "SELECT userID FROM users WHERE email = '{$email}'";
    $result = mysqli_query($conn, $sql);
    $rows = $result->num_rows;

    if($rows == 0){
        $sql = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`) VALUES ('{$firstName}', '{$lastName}', '{$email}', '{$password}')";
        $result = mysqli_query($conn, $sql);
        $_SESSION["created"] = true;
        header("Location: signupPage.php");
    }
    else{
        $_SESSION["created"] = false;
        header("Location: signupPage.php");
    }
?>
