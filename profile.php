<?php 
session_start();
?>

<!DOCTYPE html>       
<html lang="en">          
<head>          
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>User Profile</title>   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        /* Add your styles here */
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .profile-header {
            margin-bottom: 20px;
        }
        .logout-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="profile-header">Welcome, <?php echo $_SESSION['name']; ?>!</h1>
    <p>Your email: <?php echo $_SESSION['email']; ?></p>
    <button class="btn btn-danger logout-btn" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</button>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
