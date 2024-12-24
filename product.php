<?php
include "init.php";
session_start();
$id = $_GET['id'];
$query="SELECT * FROM products WHERE id =$id";
$stmt=$pdo->prepare($query);
$stmt->execute();
$products=$stmt->fetch();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        if (isset($_SESSION['email'])) {
            $q="SELECT * FROM `users` WHERE email ='".$_SESSION['email']."'";
            $stmtu=$pdo->prepare($q);
            $stmtu->execute();
            $users=$stmtu->fetch();
            $query = "INSERT INTO `orders`( `user_id`, `product_id`, `use_phone`, `user_address`, `quantity` ) 
                                    VALUES(?,?,?,?,?)";
            $stmto=$pdo->prepare($query);
            $stmto->execute([$users['id'],$products['id'],$users['phone'],$users['address'],$_POST['quantity']]);
        } else {
            $message = "you are not logged in";
            echo "<script>alert('$message');</script>";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chill Pets - Product Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="product.css">

</head>

<body>
<?php include 'includes/header.php'; ?>
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
<div class="container my-5">
    <div class="row justify-content-center">
        <!-- Product Image -->
        <div class="col-md-4">
            <img src="<?="storage/".$products['picture']?>" class="img-fluid rounded w-100" alt="<?=$products['title']?>">
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="product-title"><?=$products['title']?></h1>
            <p class="product-price"><?="$".$products['price']?></p>
            <p class="product-description">
                <?=$products['product_description']?>
            </p>
            <p class="product-features">
                <strong>Features:</strong>
            <ul>
                <li>Made with soft and breathable fabric</li>
                <li>Machine washable for easy cleaning</li>
                <li>Available in multiple sizes and colors</li>
            </ul>
            <form action="<?=$_SERVER['PHP_SELF']."?id={$products['id']}"?>" method="post">
            <!-- Quantity Selector -->
            <div class="mt-4">
                <strong>Quantity:</strong>
                <div class="d-flex align-items-center mt-2">
                    <button class="quantity-btn" onclick="decreaseQuantity()">-</button>
                    <label for="quantity"></label><input type="number" id="quantity"
                                                         class="form-control quantity-input mx-2"
                                                         value="1" min="1"
                                                          name="quantity"      >
                    <button class="quantity-btn" onclick="increaseQuantity()">+</button>
                </div>
            </div>
            <!-- Add to Cart Button -->
            <button class="btn btn-add-to-cart mt-4" name="add">Add to Cart</button>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Function to increase product quantity
    function increaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        const currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    }

    // Function to decrease product quantity
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