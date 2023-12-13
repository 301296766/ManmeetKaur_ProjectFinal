<?php
include('config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $insertQuery = "INSERT INTO products (product_name, description, price) VALUES ('$productName', '$description', '$price')";
    $insertResult = mysqli_query($connection, $insertQuery);
    if ($insertResult) {
        header('Location: home.php'); 
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Your E-Commerce Website - Add Product</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="add_product.php">Add Product</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Add New Product</h1>
        <form action="add_product.php" method="post">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea>

            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" required>

            <button type="submit">Add Product</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2023 My E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>