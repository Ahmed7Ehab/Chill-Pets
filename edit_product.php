<?php
include 'init.php';
session_start();

$id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $status = $_POST['status'];
            $category = $_POST['category'];
            //picture info
            $picture = $_FILES['picture']['name'];
            $picture_temp = $_FILES['picture']['tmp_name'];
            $picture_size = $_FILES['picture']['size'];
            $picture_ext = strtolower(pathinfo($picture, PATHINFO_EXTENSION));
            $allowed = array('jpg', 'jpeg', 'png', 'gif');
            if (in_array($picture_ext, $allowed)) {
                if ($picture_size <= 2097152) {
            $query = "UPDATE `products`
                    SET
                            category_id         = :category,
                            title               = :title ,
                            picture             = :picture,
                            product_description=:description ,
                            price               = :price,
                            p_status            =:p_status,
                            quantity            =:quantity
                    WHERE id = $id ";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindValue(':category', $category);
                    $stmt->bindValue(':title', $name);
                    $stmt->bindValue(':picture', $picture);
                    $stmt->bindValue(':description', $description);
                    $stmt->bindValue(':price', $price);
                    $stmt->bindValue(':p_status', $status);
                    $stmt->bindValue(':quantity', $quantity);
                    $stmt->execute();
                    move_uploaded_file($picture_temp, "storage/$picture");
                    if ($quantity) {
                        $stmt->bindValue(':p_status', 'In stock');
                        $stmt->execute();

                    }
                }
            }

        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="edit_product.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400..900&display=swap"
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400&display=swap"
          rel="stylesheet"/>

</head>

<body>
<!-- Home Button -->

<div class="container dashboard-container edit-container">

    <!-- Edit Product Form -->
    <div class="form-container" id="edit-form">
        <h2>Edit </h2>
        <form class="product-form" action="edit_product.php?id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="">

            <label class="form-label" for="name">Product Name: </label>
            <input class="form-control" type="text" name="name" id="name" value=""
                   required>

            <label class="form-label" for="description">Description: </label>
            <textarea class="form-control" id="description"
                      rows="3" name="description"></textarea>

            <label class="form-label" for="price">Price: </label>
            <input class="form-control" type="number" step="0.01" name="price" id="price"
                   value="" required>

            <label class="form-label" for="quantity">Quantity: </label>
            <input class="form-control" type="number"  name="quantity" id="quantity"
                   value="" required>

            <label class="form-label" for="category">Category: </label>
            <select class="form-select" id="category" name="category" required>
                <option value="" disabled>Select category</option>
                <option value="2" selected>Cat</option>
                <option value="1">Dog</option>
                <option value="4">Bird</option>
                <option value="3">Fish</option>
            </select>

            <label class="form-label" for="p_status">Product Status: </label>
            <select class="form-select" id="p_status" name="status" required>
                <option value="in_stock">In Stock</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>

            <label class="form-label" for="image">Product Image:</label>
            <input class="form-control" type="file" name="picture" id="image" accept="image/*">

            <button type="submit" class="btn btn--update" name="save">Save Changes</button>
            <a href="admin.php" class="home-btn">Back</a>

        </form>

    </div>
</div>
</body>

</html>