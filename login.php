<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = md5($password);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hashedPassword'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit();
        } else {
            echo "Invalid username or password. Please try again.";
        }
    } else {
        echo "Error: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
