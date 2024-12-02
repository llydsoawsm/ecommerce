<?php session_start(); 
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Manage Products</h1>
    <a href="add_product.php" class="btn btn-success mb-3">Add New Product</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Here you will fetch the products from the database -->
            <?php
            // Example data
            $products = [
                ['id' => 1, 'name' => 'Nike Air Max', 'price' => 7500],
                ['id' => 2, 'name' => 'Adidas Ultra Boost', 'price' => 8500]
            ];
            foreach ($products as $product) {
                echo "<tr>
                        <td>{$product['id']}</td>
                        <td>{$product['name']}</td>
                        <td>P {$product['price']}</td>
                        <td>
                            <a href='edit_product.php?id={$product['id']}' class='btn btn-warning'>Edit</a>
                            <a href='delete_product.php?id={$product['id']}' class='btn btn-danger'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
