<?php
include "init.php";
session_start();
$id=$_GET['category_id'];
$query="SELECT * FROM products WHERE category_id =$id";
$stmt=$pdo->prepare($query);
$stmt->execute();
$products=$stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish - Chill Pets</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <!--clickable product-->
        <?php foreach ($products as $product) {?>
            <a href="product.php?id=<?=$product['id']?>" style="text-decoration: none; color: inherit;">
                <div class="types">
                    <div class="product-img mb-3">
                        <i class="cart fa-solid fa-cart-shopping"></i>
                        <img src="<?= "storage/".$product['picture']?>" alt="<?=$product['title']?>">
                    </div>
                    <h3><?=$product['title']?></h3>
                    <p><?= "$".$product['price'] ?></p>
                    <p class="p_featured"><?=$product['p_status']?></p>
                </div>
            </a>
        <?php }?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
