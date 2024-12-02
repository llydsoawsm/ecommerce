<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Include the CSS from below here */
        body {
    font-family: 'Poppins', sans-serif;
}

.navbar {
    background-color: white;
    padding: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.navbar-brand {
    font-size: 28px;
    font-weight: bold;
    color: #000;
}

.nav-link {
    color: #000;
    font-weight: bold;
    transition: color 0.3s ease;
}

.nav-link.active, .nav-link:hover {
    color: black;
    text-decoration: none;
}

.nav-item {
    position: relative;
    padding: 0 20px;
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
    transition: transform 0.3s ease-out;
}

.nav-item:hover::after {
    transform: scaleX(1);
    left: 0;
    right: 0;
}

.search-container {
    display: flex;
    align-items: center;
    max-width: 0;
    overflow: hidden;
    transition: max-width 0.5s ease;
}

.search-container.active {
    max-width: 300px;
}

.search-icon {
    font-size: 24px;
    cursor: pointer;
    margin-right: 10px;
    color: #000;
    transition: transform 0.3s ease;
}

.search-icon:hover {
    transform: scale(1.1);
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

.logg {
    background-color: black;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.logg:hover {
    background-color: #444;
    transform: scale(1.1);
}

    </style>
    <title>Navbar UI</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <div class="main-logo"></div> <!-- Logo Placeholder -->
            <h1 class="navbar-brand">SneakersCity</h1>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="maindash.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">MEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">WOMEN</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        BRANDS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">NIKE</a></li>
                        <li><a class="dropdown-item" href="#">ADIDAS</a></li>
                        <li><a class="dropdown-item" href="#">LI-NING</a></li>
                    </ul>
                </li>
            </ul>
            <div class="icon-container">
                <i class="bi bi-search search-icon"></i>
                <div class="search-container">
                    <input class="form-control" type="search" placeholder="Search">
                </div>
                <i class="bi bi-bag"></i>
                <a href="auth.php" class="logg">Sign In</a>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Optional JavaScript for search toggle
    document.addEventListener("DOMContentLoaded", () => {
        const searchIcon = document.querySelector(".search-icon");
        const searchContainer = document.querySelector(".search-container");

        searchIcon.addEventListener("click", () => {
            searchContainer.classList.toggle("active");
        });
    });
</script>
</body>
</html>
