<?php
include('config.php');

function addProduct($productName, $description, $price) {
    global $connection;

    $productName = mysqli_real_escape_string($connection, $productName);
    $description = mysqli_real_escape_string($connection, $description);

    $insertQuery = "INSERT INTO products (product_name, description, price) VALUES ('$productName', '$description', '$price')";
    $insertResult = mysqli_query($connection, $insertQuery);

    return $insertResult;
}

function updateProduct($productId, $productName, $description, $price) {
    global $connection;

    $productName = mysqli_real_escape_string($connection, $productName);
    $description = mysqli_real_escape_string($connection, $description);

    $updateQuery = "UPDATE products SET product_name = '$productName', description = '$description', price = '$price' WHERE id = $productId";
    $updateResult = mysqli_query($connection, $updateQuery);

    return $updateResult;
}

function getAllProducts() {
    global $connection;

    $query = "SELECT * FROM products";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $products;
    } else {
        return false;
    }
}

function deleteProduct($productId) {
    global $connection;

    $deleteQuery = "DELETE FROM products WHERE id = $productId";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    return $deleteResult;
}
?>
