<?php
include('config.php');

$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);

if ($result) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Your E-Commerce Website - Home</title>
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
        <h1>Product Catalog</h1>

        <?php
        if (!empty($products)) {
            foreach ($products as $product) {
                echo "<div class='product'>";
                echo "<h2>{$product['product_name']}</h2>";
                echo "<p>Description: {$product['description']}</p>";
                echo "<p>Price: {$product['price']}</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No products available.</p>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2023 My E-Commerce Website. All rights reserved.</p>
    </footer>

</body>
</html>
