<nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
    <style>
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #7e4c4f;
            padding: 0.5rem 1rem;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #f5a63f !important;
        }

        .navbar-nav {
            margin-left: 400px;
        }

        .nav-link {
            font-size: 1.1rem;
            font-weight: bold;
            color: white !important;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #f5a63f !important;
        }

        .navbar .fas {
            font-size: 1.2rem;
            transition: opacity 0.3s ease;
        }

        .navbar .fas:hover {
            opacity: 0.8;
        }

        .navlist li a {
            text-decoration: none;
            color: #fff;
            transition: color 0.3s ease;
        }

        .navlist li a:hover {
            color: #f5a63f;
        }

        .icons i {
            font-size: 22px;
            margin-left: 15px;
            color: #fff;
            transition: opacity 0.3s ease;
        }

        .icons i:hover {
            opacity: 0.7;
        }
    </style>
    <div class="container">
        <a class="navbar-brand" href="#">Chill Pets</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="dog.php?category_id=1">Dog</a></li>
                <li class="nav-item"><a class="nav-link" href="cat.php?category_id=2">Cat</a></li>
                <li class="nav-item"><a class="nav-link" href="bird.php?category_id=4">Bird</a></li>
                <li class="nav-item"><a class="nav-link" href="fish.php?category_id=3">Fish</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
            <div class="ml-lg-3 d-flex align-items-center">
                <i class="fas fa-user text-white mx-2"></i>
                <a href="cart.php">
                    <i class="fas fa-shopping-cart text-white mx-2"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>