<?php
include "init.php";
session_start();
$q="SELECT * FROM `products` where avg_rete >='5' limit 4";
$stmt= $pdo->prepare($q);
$stmt->execute();
$products=$stmt->fetchAll();
$firstname='';
if (isset($_SESSION['email'])){
    $q="SELECT * FROM `users` where email='".$_SESSION['email']."'";
    $stmt=$pdo->prepare($q);
    $stmt->execute();
    $user=$stmt->fetch();
    $firstname=$user['first_name'];

}
?>
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

<?php include 'includes/header.php'; ?>

<!-- Home Image Section -->
<div class="homeimg">
    <div class="home-content text-center">
        <h2 class="homtit1"><span class="homtit2">A</span>Shelter Pet Wants</h2>
        <h2 class="homtit2">To Meet You <?=$firstname?></h2>
        <?php if (!isset($_SESSION['email'])) {
            echo '<a href="register.php" class="btn register-btn">Register</a>';
            echo '<a href="login.php" class="btn login-btn">Login</a>';
        }
        elseif ($_SESSION['role']=="admin") {
            echo '<a href="admin.php" class="btn login-btn">Admin</a>';
        }
        ?>
    </div>
</div>

<!--Category Section -->
<div class="categories-container mb-5">
    <h2>Shop by <span>Categories</span></h2>
    <div class="categories-wrapper">
        <div class="category">
            <a href="dog.php?category=1">
                <img src="Assets/Images/dog.jpg" alt="Dog">
            </a>
            <a href="cat.php?category_id=1"><p>Dog</p></a>
        </div>
        <div class="category">
            <a href="cat.php?category_id=2">
                <img src="Assets/Images/cat.jpg" alt="Cat">
            </a>
            <a href="cat.php?category_id=2"><p>Cat</p></a>
        </div>
        <div class="category">
            <a href="fish.php?category_id=3">
                <img src="Assets/Images/fish.jpg" alt="Fish">
            </a>
            <a href="fish.php?category_id=3"><p>Fish</p></a>
        </div>
        <div class="category">
            <a href="bird.php?category_id=4">
                <img src="Assets/Images/bird2.png" alt="Bird">
            </a>
            <a href="bird.php?category_id=4"><p>Bird</p></a>
        </div>
    </div>
</div>

<div class="featured_product">
    <h2>Featured Products</h2>
    <div class="featured-wrapper">
        <!--clickable product-->
        <?php foreach ($products as $product){?>
        <a href="product.php" style="text-decoration: none; color: inherit;">
            <div class="types">
                <div class="product-img mb-3">
                    <i class="cart fa-solid fa-cart-shopping"></i>
                    <img src="<?="storage/".$product['picture']?>" alt="<?= $product['title']?>">
                </div>
                <h3><?= $product['title']?></h3>
                <p><?= "$".$product['price']?></p>
                <p class="p_featured"><?= $product['p_status']?></p>
            </div>
        </a>
        <?php }?>
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
<?php include 'includes/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
