<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chill Pet</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
<!-- Header Section -->
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Chill Pets</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Dog</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Cat</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Bird</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Fish</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
            <div class="ml-lg-3 d-flex align-items-center">
                <i class="fas fa-user text-white mx-2"></i>
                <i class="fas fa-shopping-cart text-white"></i>
            </div>
        </div>
    </div>
</nav>

<!-- Home Image Section -->
<div class="homeimg">
    <div class="home-content text-center">
        <h2 class="homtit1"><span class="homtit2">A</span>Shelter Pet Wants</h2>
        <h2 class="homtit2">To Meet You</h2>
        <button class="register-btn btn">Register</button>
        <button class="login-btn btn">Login</button>
    </div>
</div>

<!--Category Section -->
<div class="categories-container mb-5">
    <h2>Shop by <span>Categories</span></h2>
    <div class="categories-wrapper">
        <div class="category">
            <img src="Assets/Images/dog.jpg" alt="Dog">
            <p>Dog</p>
        </div>
        <div class="category">
            <img src="Assets/Images/cat.jpg" alt="Cat">
            <p>Cat</p>
        </div>
        <div class="category">
            <img src="Assets/Images/fish.jpg" alt="Fish">
            <p>Fish</p>
        </div>
        <div class="category">
            <img src="Assets/Images/bird2.png" alt="Bird">
            <p>Bird</p>
        </div>
    </div>
</div>

<div class="featured_product">
    <h2>Featured Products</h2>
    <div class="featured-wrapper">
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i>
                <img src="Assets/Images/dogf.png" alt="Healthy Treats">
            </div>
            <h3>Healthy Treats</h3>
            <p>RS.50.34$</p>
            <p class="p_featured">instock</p>
        </div>
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i> <!-- Add to Cart Icon -->
                <img src="Assets/Images/lowsunf.png" alt="Freeze Dried">
            </div>
            <h3>Freeze Dried</h3>
            <p>RS.18.47$</p>
            <p class="p_featured">instock</p>
        </div>
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i> <!-- Add to Cart Icon -->
                <img src="Assets/Images/prodied.png" alt="Dog">
            </div>
            <h3>prodied</h3>
            <p>RS.25.00$</p>
            <p class="p_featured">soldout</p>
        </div>
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i> <!-- Add to Cart Icon -->
                <img src="Assets/Images/freezed.png" alt="Cat">
            </div>
            <h3>Freezed </h3>
            <p>RS.30.00$</p>
            <p class="p_featured">instock</p>
        </div>

    </div>
</div>


<div class="featured_product">
    <div class="featured-wrapper">
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i>
                <img src="Assets/Images/Lamb_Fillets.png" alt="Healthy Treats">
            </div>
            <h3>Lamb Fillets</h3>
            <p>RS.80.14$</p>
            <p class="p_featured">instock</p>
        </div>
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i>
                <img src="Assets/Images/pro-rich-fish.png" alt="Freeze Dried">
            </div>
            <h3>Pro-Rich Fish</h3>
            <p>RS.50$</p>
            <p class="p_featured">instock</p>
        </div>
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i>
                <img src="Assets/Images/Discuss_fish.png" alt="Dog">
            </div>
            <h3>Discuss Fish</h3>
            <p>RS.25.00$</p>
            <p class="p_featured">soldout</p>
        </div>
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i>
                <img src="Assets/Images/Pupy_Dry_Formulaf.webp" alt="Cat">
            </div>
            <h3>Pupy Dry Formula Food </h3>
            <p>RS.60.00$</p>
            <p class="p_featured">instock</p>
        </div>

    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
