<?php
include "init.php";
session_start();
if (isset($_SESSION['email']) ) {
    $total=0;
    /// user
    $q="SELECT * FROM `users` WHERE email ='".$_SESSION['email']."' limit 1"; ;
    $stmtu=$pdo->prepare($q);
    $stmtu->execute();
    $users=$stmtu->fetch();
    //// oprder
    $status = "pending";
    $q2="SELECT * FROM `orders` WHERE user_id ='".$users['id']."'and o_status ='pending'";
    $stmt2=$pdo->prepare($q2);
    $stmt2->execute();
    $orders=$stmt2->fetchAll();
    ///delete
    if (isset($_POST['delete'])) {
        $delet="DELETE FROM `orders` WHERE id ='".$_POST['delete']."'";
        $stmt=$pdo->prepare($delet);
        $stmt->execute();
        header('Location: cart.php');
    }
    /// proceed
    $uid=$users['id'];
    if (isset($_POST['proceed'])) {
        echo "ppp";
        foreach ($orders as $orderr) {
            $qq = " UPDATE `orders` 
                    SET `o_status` = 'confermed'
                    WHERE id ='".$orderr['id']."'";
            $stmt = $pdo->prepare($qq);
            $stmt->execute();
            //conferm
            $cq="INSERT INTO `confermed`( `order_id`, `user_id`) VALUES ( :oid,:uid)";
            $stmt2=$pdo->prepare($cq);
            $stmt2->bindParam(':oid', $orderr['id']);
            $stmt2->bindParam(':uid',$users['id'] );
            $stmt2->execute();
            //
//            $delett="DELETE FROM `orders` WHERE id ='".$orderr['id']."'";
//            $stmtt=$pdo->prepare($delett);
//            $stmtt->execute();
            header('Location: cart.php');
        }

    }
    /// product
//    $query="SELECT * FROM products WHERE id ='".$orders['product_id']."'";
//    $stmt=$pdo->prepare($query);
//    $stmt->execute();
//    $products=$stmt->fetch();
}
else{
    echo "faild";
  //  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Chill Pets</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="cart.css">
</head>

<body>
<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="bg-light py-5 hero-section">
    <div class="container text-center text-white">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">Your Shopping Cart</h1>
                <p class="lead mt-3">
                    Everything your pet needs is just a step away. Review your cart and proceed to checkout to make your
                    furry friend happy!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section -->
<section class="py-5">
    <div class="container ">
        <!-- Cart Items -->
        <?php foreach ($orders as $order) {
            $q4="SELECT * FROM products WHERE id ='".$order['product_id']."'";
            $stmt4=$pdo->prepare($q4);
            $stmt4->execute();
            $product=$stmt4->fetch();
            $total=$product['price']*$order['quantity'];
            ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4">
                            <img src="<?="storage/".$product['picture']?>" class="product-image img-fluid w-100 rounded-start"
                                 alt="<?=$product['title']?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title product-title"><?=$product['title']?></h5>
                                <p class="card-text product-description"><?=$product['product_description']?>.</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="fw-bold"><?="$".$product['title']?></span>
                                    <div class="mt-4">
                                        <strong>Quantity:<?=$order['quantity']?></strong>
                                        <div class="d-flex align-items-center mt-2">
<!--                                            <button class="quantity-btn" onclick="decreaseQuantity()">-</button>-->
                                            <label for="quantity"></label><input type="number" id="quantity"
                                                                                 class="form-control quantity-input mx-2"
                                                                                 value="1" min="1">
<!--                                            <button class="quantity-btn" onclick="increaseQuantity()">+</button>-->
                                        </div>
                                    </div>
                                    <form action="cart.php" method="post" >
                                    <button class="btn-remove" name="delete" value="<?=$order['id']?>">
                                        Remove
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php } ?>
            <!-- Summary Section -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title summary-title">Cart Summary</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span class="summary-text">$15.99</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shipping</span>
                                <span class="summary-text">$5.00</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tax</span>
                                <span class="summary-text">$1.25</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between fw-bold">
                                <span>Total</span>
                                <span><?php
                                    if ($total) {
                                        echo "$" . (double)$total + 22.24;
                                    }
                                    else{
                                        echo "$0";
                                    }
                                    ?>
                                </span>
                            </li>
                        </ul>
                        <!-- Checkout Button -->
                        <form action="cart.php" method="post">
                        <button class="btn-checkout"  name="proceed">
                                Proceed to Checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!-- Checkout Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter your address" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter your city" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <select class="form-select" id="paymentMethod" required>
                            <option value="" selected disabled>Select Payment Method</option>
                            <option value="credit-card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn-modal-confirm" data-bs-toggle="modal"
                        data-bs-target="#orderConfirmationModal">Confirm Payment
                </button>
            </div>
        </div>
    </div>
</div>

 <!--Order Confirmation Modal -->
<div class="modal fade" id="orderConfirmationModal" tabindex="-1" aria-labelledby="orderConfirmationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="orderConfirmationModalLabel">Order Confirmed!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="text-success fs-4">🎉 Your order has been successfully placed!</p>
                <p class="text-muted">
                    Thank you for choosing Chill Pets. You will receive a confirmation email shortly with the details.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal-cancel" data-bs-toggle="modal"
                        data-bs-target="#orderCanceledModal">Cancel Order
                </button>
                <button type="button" class="btn-modal-confirm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Order Canceled Modal -->
<div class="modal fade" id="orderCanceledModal" tabindex="-1" aria-labelledby="orderCanceledModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="orderCanceledModalLabel">Order Canceled</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p class="text-danger fs-4">🚫 Your order has been canceled.</p>
                <p class="text-muted">
                    You can continue shopping or place a new order anytime. Thank you for visiting Chill Pets!
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-modal-confirm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>

</body>

</html>