<?php
global $pdo;
include 'init.php';
session_start();
if (isset($_SESSION['email'])) {
    if ($_SESSION['role'] == 'admin') {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['add'])) {
                $query = 'INSERT INTO products (category_id ,title,picture,product_description,price,p_status,quantity)
                    values (:category,:title,:picture,:description,:price,:p_status,:quantity)';
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $quantity = $_POST['quantity'];
                $category = strtolower($_POST['category']);
                //picture info
                $picture = $_FILES['picture']['name'];
                $picture_temp = $_FILES['picture']['tmp_name'];
                $picture_size = $_FILES['picture']['size'];
                $picture_ext = strtolower(pathinfo($picture, PATHINFO_EXTENSION));
                $allowed = array('jpg', 'jpeg', 'png', 'gif');
                if (in_array($picture_ext, $allowed)) {
                    if ($picture_size <= 2097152) {
                        $stmt = $pdo->prepare($query);
                        $stmt->bindValue(':category', $category);
                        $stmt->bindValue(':title', $name);
                        $stmt->bindValue(':picture', $picture);
                        $stmt->bindValue(':description', $description);
                        $stmt->bindValue(':price', $price);
                        $stmt->bindValue(':quantity', $quantity);
                        $stmt->execute();
                        move_uploaded_file($picture_temp, "storage/$picture");
                        if ($quantity) {
                            $stmt->bindValue(':p_status', 'instock');
                            $stmt->execute();
                        }
                    }
                }

            }
        }
    }
} else {
    echo "you are not allowed to access this page";
    echo "you will be redirected back to home page";
    header("refresh:2;url=home.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chill Pets Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container my-5">
    <!-- Header -->
    <header class="mb-4 text-center">
        <h1>Chill Pets - Admin Dashboard</h1>
        <p class="text-center">Manage pets and products efficiently</p>
    </header>

    <!-- Add Product Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h5 mb-0">Add New Product</h2>
        </div>
        <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <!--name-->
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" name="name"
                           placeholder="Enter product name" required>
                </div>
                <!--desc-->
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Description</label>
                    <input type="text" class="form-control" id="productName" name="description"
                           placeholder="Enter product description" required>
                </div>
                <!--price-->
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" id="productPrice" name="price" placeholder="Enter price"
                           step="0.01" required>
                </div>
                <!--quantity-->
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="productPrice" name="price"
                           placeholder="Enter quantity" required>
                </div>
                <!--category-->
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Category</label>
                    <select class="form-select" id="productCategory" name="category" required>
                        <option value="" disabled selected>Choose category</option>
                        <option value="2">Cat</option>
                        <option value="1">Dog</option>
                        <option value="4">Bird</option>
                        <option value="3">Fish</option>
                    </select>
                </div>
                <!--status-->
                <div class="mb-3">
                    <label for="productStatus" class="form-label">Product Status</label>
                    <select class="form-select" id="productStatus" required>
                        <option value="" disabled selected>Choose status</option>
                        <option value="in_stock">In Stock</option>
                        <option value="out_of_stock">Out of Stock</option>
                    </select>
                </div>
                <div class="mb-3">
                    <!-- image -->
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="picture" id="productImage" required>
                </div>
                <button type="submit" class="btn btn-primary" name="add">Add Product</button>
            </form>
        </div>
    </div>
    <?php
    $query = "SELECT * FROM products";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll();
    ?>
    <!-- Products Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="h5 mb-0">All Products</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Example Row -->
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td>
                                <img src="
                    <?= "storage/" . $product['picture'] ?>" alt="Product Image" class="img-fluid">
                            </td>
                            <td><?= $product['title'] ?></td>
                            <td><?= "$" . $product['price'] ?></td>
                            <td><?php
                                $query2 = 'SELECT category_name FROM categories where id = "' . $product['category_id'] . '" ';;
                                $stmt2 = $pdo->prepare($query2);
                                $stmt2->execute();
                                $categories = $stmt2->fetchAll();
                                echo $categories['0']['category_name'];
                                ?></td>
                            <td><?= $product['p_status'] ?></td>
                            <td><?= $product['quantity'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-warning me-3" data-bs-toggle="modal"
                                        data-bs-target="#editProductModal">Edit
                                </button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="editProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" value="Premium Cat Food" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editProductDescription" rows="3"
                                  placeholder="Enter detailed description here">Premium cat food made with natural ingredients.</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editProductPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="editProductPrice" value="20.99" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="editProductQuantity" value="10" required>
                    </div>
                    <div class="mb-3">
                        <label for="editProductCategory" class="form-label">Category</label>
                        <select class="form-select" id="editProductCategory" required>
                            <option value="" disabled>Select category</option>
                            <option value="cat" selected>Cat</option>
                            <option value="dog">Dog</option>
                            <option value="bird">Bird</option>
                            <option value="fish">Fish</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editProductStatus" class="form-label">Product Status</label>
                        <select class="form-select" id="editProductStatus" required>
                            <option value="in_stock">In Stock</option>
                            <option value="out_of_stock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editProductImage" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="editProductImage">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>