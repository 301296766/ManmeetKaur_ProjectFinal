<?php
include('config.php');

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $query = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $updateQuery = "UPDATE products SET product_name = '$productName', description = '$description', price = '$price' WHERE id = $productId";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
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
    <title>Your E-Commerce Website - Edit Product</title>
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
        <h1>Edit Product</h1>
        <form action="edit_product.php?id=<?php echo $productId; ?>" method="post">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required>

            <label for="description">Description:</label>
            <textarea name="description" required><?php echo $product['description']; ?></textarea>

            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>

            <button type="submit">Update Product</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2023 My E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
