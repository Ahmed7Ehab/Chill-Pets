<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chill Pets - Product Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="product.css">

</head>

<body>
<!-- Hero Section -->
<section class="bg-light py-5 hero-section">
    <div class="container text-center text-white">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">Product</h1>
                <p class="lead mt-3">
                    Everything your pet needs is just a step away. Review your cart and proceed to checkout to make your
                    furry friend happy!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Product Details Section -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Product Image -->
        <div class="col-md-4">
            <img src="Assets/Images/product19.jpg" class="img-fluid rounded w-100" alt="Product Image">
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="product-title">Cozy Pet Bed</h1>
            <p class="product-price">$29.99</p>
            <p class="product-description">
                Your pet deserves the best rest! This cozy pet bed is designed with soft, durable materials to
                ensure maximum comfort for your furry friend. Its neutral design makes it a perfect fit for
                any room decor.
            </p>
            <p class="product-features">
                <strong>Features:</strong>
            <ul>
                <li>Made with soft and breathable fabric</li>
                <li>Machine washable for easy cleaning</li>
                <li>Available in multiple sizes and colors</li>
            </ul>

            <!-- Quantity Selector -->
            <div class="mt-4">
                <strong>Quantity:</strong>
                <div class="d-flex align-items-center mt-2">
                    <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                    <label for="quantity"></label><input type="number" id="quantity"
                                                         class="form-control quantity-input mx-2" value="1" min="1">
                    <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                </div>
            </div>

            <!-- Add to Cart Button -->
            <button class="btn btn-add-to-cart mt-4">Add to Cart</button>
        </div>
    </div>
    <div class="additional-space mb-5"></div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function increaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        const currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }

    function decreaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        const currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }
</script>
</body>
</html>