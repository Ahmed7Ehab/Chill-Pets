<?php
include "init.php";
session_start();
$q="SELECT * FROM `products`  order by avg_rete limit 4";
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
            echo '<a href="logout.php" class="btn register-btn">Logout</a>';
        }
        else {
            echo '<a href="logout.php" class="btn register-btn">Logout</a>';
        }
        ?>
    </div>
</div>

<!--Category Section -->
<div class="categories-container mb-5">
    <h2>Shop by <span>Categories</span></h2>
    <div class="categories-wrapper">
        <div class="category">
            <a href="dog.php?category_id=1">
                <img src="Assets/Images/dog.jpg" alt="Dog">
            </a>
            <a href="dog.php?category_id=1"><p>Dog</p></a>
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
        <a href="product.php?id=<?=$product['id']?>" style="text-decoration: none; color: inherit;">
            <div class="types">
                <div class="product-img mb-3">
<!--                    <i class="cart fa-solid fa-cart-shopping"></i>-->
                    <img src="<?="storage/".$product['picture']?>" alt="<?= $product['title']?>">
                </div>
                <h3><?= $product['title']?></h3>
                <p><?= "$".$product['price']?></p>
                <p class="p_featured"><?= $product['p_status']?></p>
            </div>
        </a>
        <?php }?>
    </div>
</div>


<?php include 'includes/footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>