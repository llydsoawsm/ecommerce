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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <nav>
        <ul class="list-group">
            <li class="list-group-item"><a href="manage_products.php">Manage Products</a></li>
            <li class="list-group-item"><a href="manage_users.php">Manage Users</a></li>
            <li class="list-group-item"><a href="view_orders.php">View Orders</a></li>
            <li class="list-group-item"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</div>

</body>
</html>
