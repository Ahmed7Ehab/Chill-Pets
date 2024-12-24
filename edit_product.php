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
        <h2>Edit (Premium Cat Food) </h2>
        <form class="product-form" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="">

            <label class="form-label" for="name">Product Name: </label>
            <input class="form-control" type="text" name="name" id="name" value="Premium Cat Food"
                   required>

            <label class="form-label" for="description">Description: </label>
            <textarea class="form-control" id="description"
                      rows="3">Premium cat food made with natural ingredients.</textarea>

            <label class="form-label" for="price">Price: </label>
            <input class="form-control" type="number" step="0.01" name="price" id="price"
                   value="20.99" required>

            <label class="form-label" for="quantity">Quantity: </label>
            <input class="form-control" type="number" step="0.01" name="quantity" id="quantity"
                   value="20" required>

            <label class="form-label" for="category">Category: </label>
            <select class="form-select" id="category" required>
                <option value="" disabled>Select category</option>
                <option value="cat" selected>Cat</option>
                <option value="dog">Dog</option>
                <option value="bird">Bird</option>
                <option value="fish">Fish</option>
            </select>

            <label class="form-label" for="p_status">Product Status: </label>
            <select class="form-select" id="p_status" required>
                <option value="in_stock">In Stock</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>

            <label class="form-label" for="image">Product Image:</label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*">

            <button type="submit" class="btn btn--update">Save Changes</button>
            <a href="admin.php" class="home-btn">Back</a>

        </form>

    </div>
</div>
</body>

</html>