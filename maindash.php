<?php session_start(); ?> 
<!DOCTYPE html>          
<html lang="en">              
<head>           
    <meta charset="UTF-8">       
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>SneakersCity</title>   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: white;
        }

        .navbar {
            background: white;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1030;
        }

        .navbar-brand, .nav-link {
            color: #000 !important;
            padding: 2px;
            transition: transform 0.3s ease, color 0.3s ease;
            font-weight: bold;
        }

        .navbar-brand {
            font-size: 28px;
        }

        .nav-link.active {
            color: black !important;
            text-decoration: none;
        }

        .nav-link:hover {
            color: transparent;
        }

        .nav-item {
            position: relative;
            padding: 20px 0;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            left: 50%;
            right: 50%;
            bottom: 0;
            height: 2px;
            background-color: black;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.3s ease-out;
        }

        .nav-item:hover::after {
            transform: scaleX(1);
            transform-origin: center;
            left: 0;
            right: 0;
        }

        .dropdown-menu {
            background-color: #fff;
            transition: background-color 0.3s ease, color 0.3s ease;
            padding: 10px;
            z-index: 1040;
        }

        .dropdown-item {
            color: #000;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #000;
            border-radius: 0;
        }

        .form-control::placeholder {
            color: #555;
        }

        .form-control:focus {
            border-color: #000;
            box-shadow: none;
            transition: border-color 0.3s ease;
        }

        .modal-body input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .modal-footer .btn {
            width: auto;
        }

        .container{
            font-family: 'Poppins', sans-serif;
            font-size:20px;
        }

        .search-container {
            display: flex;
            align-items: center;
            transition: max-width 0.5s ease;
            max-width: 0;
            overflow: hidden;
        }

        .search-container.active {
            max-width: 300px;
        }

        .search-icon {
            font-size: 24px;
            cursor: pointer;
            color: #000;
            margin-right: 10px;
            position: relative;
            right: -4px;
            top: 2px;
            transition: transform 0.3s ease;
        }

        .search-icon:hover {
            transform: scale(1.1);
        }

        .icon-container {
            display: flex;
            align-items: center;
            gap:10px;
        }

        .bi-bag {
            font-size: 28px;
            margin-left: 10px;
            margin-right: 20px;
            transition: transform 0.3s ease;
        }

        .bi-bag:hover {
            transform: scale(1.1);
        }

        a {
            font-family: 'Poppins', sans-serif;
            display: inline-block;
            color: black;
            text-decoration: none;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        a:hover { 
            transform: scale(1.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .user {
            font-size: 32px;
            position: relative;
            right: 8px;
            transition: transform 0.3s ease;
        }

        .user:hover {
            transform: scale(1.1);
        }

        .logg {
            border: 1px solid transparent;
            border-radius: 6px;
            position: relative;
            top: -4px;
            color: white;
            background-color: black;
            padding: 4px 8px;
            display: inline-block;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .logg:hover {
            transform: scale(1.1);
        }

        #home {
            width: 100%;
            height: 100vh;
        }

        .carousel-inner img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        .main-logo {
            height: 40px;
            width: 40px;
            border-radius: 100%;
            background-image: url('pictures/1.png');
            background-size: cover;
            background-repeat: no-repeat;
            margin-right: 10px;
        }

        @media (max-width: 768px) {
            .carousel-item:nth-child(2) img {
                content: url('./pictures/portraitbanner.png');
            }
        }

        @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

        .navbar {
            border-radius: 8px;
            overflow: hidden;
            margin: auto;
            position: relative;
            background-color: #fff;
        }

        .main-nav:hover ~ .indicator {
            transform: scaleX(1);
        }

        .nav-item {
            padding: 5px;
            cursor: pointer;
            white-space: nowrap;
        }

        .indicator {
            position: absolute;
            height: 3px;
            background-color: #e74c3c;
            top: calc(100% - 2px);
            transition: all 0.3s ease-in-out;
            transform: scaleX(0);
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 70px;
            justify-content: center;
        }

        .product-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            width: 320px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
        }

        .product-image {
            width: 100%;
            height: 75%;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-image img:hover {
            transform: scale(1.15);
        }

        .product-info {
            padding: 15px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .product-name {
            font-size: 1.6rem;
            font-weight: bold;
            color: #333333;
            margin-bottom: 10px;
            text-align: center;
            white-space:nowrap;
            overflow:hidden;
            text-overflow:ellipsis;
            margin:;
        }

        .product-rating {
            color: #ffc107;
            font-size: 1.4rem;
            margin: 10px 0;
        }

        .product-rating .rating-number {
            color: black;
        }

        .product-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: #555555;
            margin-bottom: 18px;
        }

        .product-btn {
            background: linear-gradient(135deg, #343a40, #495057);
            color: #f8f9fa;
            padding: 12px 15px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .product-btn:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #495057, #343a40);
        }

        .footer {
            background-color: #121212;
            padding: 40px 0;
            text-align: center;
            font-family: 'Roboto', sans-serif;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .footer-info p {
            margin: 5px 0;
            color: white;
        }

        .footer-links {
            margin-top: 20px;
        }

        .footer-links a {
            color:white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 1rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .footer-links a:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .footer-links {
                margin-top: 15px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .footer-links a {
                margin-bottom: 10px;
            }
        }

        .hr-container {
            position: relative;
            text-align: center;
            margin: 20px 0;
        }

        .hr-container hr {
            border: none;
            height: 1px;
            background-color: black;
            margin: 0;
        }

        .hr-container span {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            padding: 0 10px;
            font-size: 1.4rem;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <!--marquee tag for header moving with text and the-->
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="main-logo"></div> 
            <h1 class="navbar-brand">SneakersCity</h1>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                    <a class="nav-link active" aria-current="page" href="maindash.php">HOME</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link active" href="men.php">MEN</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link active" href="#">WOMEN</a>
                </li>
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        BRANDS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">NIKE</a></li>
                        <li><a class="dropdown-item" href="#">ADIDAS</a></li>
                        <li><a class="dropdown-item" href="#">LI-NING</a></li>
                        <li><a class="dropdown-item" href="#">ANTA</a></li>
                    </ul>
                </li>
            </ul>
            <div class="icon-container">
                <i class="bi bi-search search-icon" id="searchIcon"></i>
                <div class="search-container" id="searchContainer">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </div>
                <i class="bi bi-bag"></i>
                <?php  
                if (!isset($_SESSION['email'])) {
                    echo '
                    <div class="lgnbtn">
                        <a href="auth.php">Sign In</a>
                    </div>';
                } else {
                    echo '
                    <div class="profile-section">
                        <a href="profile.php" title="' . $_SESSION['name'] . '"><i class="user bi-person"></i></a>
                    </div>';
                }
                ?>
            </div>
        </div> 
    </div> 
</nav>


<!-- Carousel Section -->
<section id="home">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./pictures/backG.jpg" class="d-block w-100" alt="Background Image 1">
            </div>
            <div class="carousel-item">
                <img src="./pictures/banner.png" class="d-block w-100" alt="Background Image 2">
            </div>
            <div class="carousel-item">
                <img src="https://external-preview.redd.it/dV841jDDM3x3jqU2utXqfY_-pjnGvNWq2hqjpPFm3A8.png?format=pjpg&auto=webp&s=a094af948bb1cc368e2fc1911f5528633fa0550e" class="d-block w-100" alt="Background Image 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- Product Section -->
<section id="product" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <div class="hr-container">
        <hr>
            <span>FIND YOUR PERFECT SNEAKERS</span>
            <p>Where style meets simplicity</p>
        </div>
    </div>
    <div class="product-container">
        <!-- Product Card 1 -->
        <div class="product-card">
            <div class="product-image">
                <img src="./pictures/air_max_97_silver_bullet.jpg" alt="Nike Air Max 2021">
            </div>
            <div class="product-info">
                <h3 class="product-name">Miss ko na siya haha gege huhu sadasdads</h3>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <span class="rating-number">4</span>
                </div>
                <p class="product-price">₱8,999.00</p>
                <button class="product-btn">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product Card 2 -->
        <div class="product-card">
            <div class="product-image">
                <img src="./pictures/J1SFB.jpg" alt="Adidas UltraBoost">
            </div>
            <div class="product-info">
                <h3 class="product-name">awit lods :))</h3>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span class="rating-number">5</span>
                </div>
                <p class="product-price">₱7,599.00</p>
                <button class="product-btn">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product Card 3 -->
        <div class="product-card">
            <div class="product-image">
                <img src="./pictures/Samba.avif" alt="Reebok Classic">
            </div>
            <div class="product-info">
                <h3 class="product-name">hekhek</h3>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                    <span class="rating-number">3.5</span>
                </div>
                <p class="product-price">₱4,999.00</p>
                <button class="product-btn">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product Card 4 -->
        <div class="product-card">
            <div class="product-image">
                <img src="./pictures/li-ningJB2.png" alt="Puma RS-X">
            </div>
            <div class="product-info">
                <h3 class="product-name">awit talaga</h3>
                <div class="product-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span class="rating-number">4.5</span>
                </div>
                <p class="product-price">₱12,999.00</p>
                <button class="product-btn">
                    <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
    const searchIcon = document.querySelector(".search-icon");
    const searchContainer = document.querySelector(".search-container");

    searchIcon.addEventListener("click", () => {
        searchContainer.classList.toggle("active");
    });
});

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-info">
            <p>&copy; 2024 Your E-Commerce Store. All Rights Reserved.</p>
            <p>Trusted by thousands of customers worldwide.</p>
        </div>
        <div class="footer-links">
            <a href="#privacy-policy">Privacy Policy</a> |
            <a href="#terms-conditions">Terms & Conditions</a> |
            <a href="#contact-us">Contact Us</a> |
            <a href="#about-us">About Us</a>
        </div>
    </div>
</footer>
