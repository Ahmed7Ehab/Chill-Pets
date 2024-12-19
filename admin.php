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
            <form>
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" placeholder="Enter product name" required>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" id="productPrice" placeholder="Enter price" required>
                </div>
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Category</label>
                    <select class="form-select" id="productCategory" required>
                        <option value="" disabled selected>Choose category</option>
                        <option value="cat">Cat</option>
                        <option value="dog">Dog</option>
                        <option value="bird">Bird</option>
                        <option value="fish">Fish</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="productImage" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>
    </div>

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
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Example Row -->
                    <tr>
                        <td>
                            <img src="Assets/Images/product19.jpg" alt="Product Image" class="img-fluid">
                        </td>
                        <td>Premium Cat Food</td>
                        <td>$20.99</td>
                        <td>Cat</td>
                        <td>
                            <button class="btn btn-sm btn-warning me-3" data-bs-toggle="modal"
                                    data-bs-target="#editProductModal">Edit
                            </button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>

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
                        <label for="editProductPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="editProductPrice" value="20.99" required>
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