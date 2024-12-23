<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish - Chill Pets</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="cat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
<?php include 'includes/header.php'; ?>
<!-- Hero Section -->
<section class="bg-light py-5 hero-section">
    <div class="container text-center text-white">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">Fish Collection</h1>
                <p class="lead mt-3">
                    Everything your pet needs is just a step away. Review your cart and proceed to checkout to make your
                    furry friend happy!
                </p>
            </div>
        </div>
    </div>
</section>

<div class="featured_product container my-5">
    <div class="featured-wrapper">
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i>
                <img src="Assets/Images/product3.jpg" alt="Healthy Treats">
            </div>
            <h3>Lamb Fillets</h3>
            <p>RS.80.14$</p>
            <p class="p_featured">instock</p>
        </div>
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i>
                <img src="Assets/Images/product4.jpg" alt="Freeze Dried">
            </div>
            <h3>Pro-Rich Fish</h3>
            <p>RS.50$</p>
            <p class="p_featured">instock</p>
        </div>
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i>
                <img src="Assets/Images/product16.jpg" alt="Dog">
            </div>
            <h3>Discuss Fish</h3>
            <p>RS.25.00$</p>
            <p class="p_featured">soldout</p>
        </div>
        <div class="types">
            <div class="product-img mb-3">
                <i class="cart fa-solid fa-cart-shopping"></i>
                <img src="Assets/Images/product20_8d6fda60-29ab-4bfb-a3c1-47d515d4a91c.jpg" alt="Cat">
            </div>
            <h3>Pupy Dry Formula Food </h3>
            <p>RS.60.00$</p>
            <p class="p_featured">instock</p>
        </div>

    </div>
</div>
<?php include 'includes/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
