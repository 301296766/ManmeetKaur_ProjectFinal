<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = md5($password);

    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if ($checkResult) {
        if (mysqli_num_rows($checkResult) > 0) {
            echo "Username '$username' is already taken. Please choose another username.";
        } else {
            
            $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
            $insertResult = mysqli_query($connection, $insertQuery);

            if ($insertResult) {
                echo "Registration successful! You can now <a href='index.html'>login</a>.";
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
