<?php 
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conn.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {  
    if (isset($_POST['register'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $checksql = "SELECT * FROM tbl_user WHERE fld_email = '$email'";
        $result = $conn->query($checksql);

        if ($result->num_rows > 0) {
            echo "<script>alert('Email already taken');</script>";
        } else {
            $sql = "INSERT INTO tbl_user(fld_name, fld_email, fld_password) VALUES ('$name', '$email', '$hashed_password')"; 
            if ($conn->query($sql) === TRUE) { 
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header("Location: maindash.php");
                exit();
            } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        }
    } elseif (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM tbl_user WHERE fld_email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['fld_password'])) {
                $_SESSION['email'] = $row['fld_email'];
                $_SESSION['name'] = $row['fld_name'];
                header("Location: maindash.php");
                exit();
            } else {
                echo "<script>alert('Invalid password');</script>";
            }
        } else {
            echo "<script>alert('No user found!');</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SneakersCity</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e0c3fc, #8ec5fc);
        }

        .container {
            display: flex;
            width: 52%;
            height: 52%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
        }

        .left {
            flex: 1;
            background-color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            position: relative;
        }

        .left h1 {
            font-size: 28px;
            font-weight: 600;
            color: #333;
        }

        .left p {
            font-size: 16px;
            color: gray;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Back to Dashboard at the bottom left */
        .back-text {
            position: absolute;
            bottom: 10px;
            left: 10px;
            font-size: 14px;
            font-weight: bold;
            color: black;
            cursor: pointer;
            text-decoration: none;
            padding-bottom: 2px;
        }

        .indicator {
            position: absolute;
            height: 2px;
            background-color: black; /* Changed to black */
            width: 0;
            left: 50%;
            top: 100%;
            transform: translateX(-50%);
            transition: all 0.3s ease-in-out;
        }

        .back-text:hover .indicator {
            width: 100%;
        }

        .right {
            flex: 1;
            background-color: gray;
        }

        .nav-tabs .nav-link {
            color: black;
            font-weight: bold;
            font-size: 14px;
        }

        .nav-tabs .nav-link.active {
            color: white;
            background-color: black;
            border-radius: 5px;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn {
            width: 100%;
            border: none;
            padding: 8px;
            border-radius: 5px;
            background-color: black;
            color: white;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #333;
        }

        .forgot-password {
            margin-top: 10px;
            font-size: 12px;
        }

        .forgot-password a {
            color: black;
            text-decoration: none;
            font-weight: bold;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                width: 80%;
                height: auto;
                flex-direction: column;
            }

            .left {
                order: 2;
                width: 100%;
                padding: 15px;
            }

            .right {
                order: 1;
                height: 200px;
                background-size: cover;
            }
        }

        @media (max-width: 480px) {
            .btn {
                font-size: 12px;
                padding: 6px;
            }

            .nav-tabs .nav-link {
                font-size: 12px;
            }

            .form-control {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left">
            <h1>SneakersCity</h1>
            <p>Your one-stop destination for the latest and trendiest sneakers.</p>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <form action="auth.php" method="POST">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                        <button type="submit" name="login" class="btn">Login</button>
                    </form>
                    <div class="forgot-password">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <form action="auth.php" method="POST">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                        <button type="submit" name="register" class="btn">Register</button>
                    </form>
                </div>
            </div>
            <a href="maindash.php" class="back-text">Go to Dashboard <div class="indicator"></div></a> <!-- Back to Dashboard link positioned at the bottom left -->
        </div>
        <div class="right"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const backText = document.querySelector(".back-text");
            const indicator = document.querySelector(".indicator");

            backText.addEventListener("mouseenter", function() {
                indicator.style.width = `${backText.offsetWidth}px`; // Set width to match text
                indicator.style.left = "50%"; // Align to the middle of the text
                indicator.style.transform = "translateX(-50%)"; // Correct the position
            });

            backText.addEventListener("mouseleave", function() {
                indicator.style.width = "0"; // Hide indicator when mouse leaves
            });
        });
    </script>
</body>
</html>
