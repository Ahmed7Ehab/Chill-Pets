<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Contact</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"-->
<!--          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="-->
<!--          crossorigin="anonymous" referrerpolicy="no-referrer"/>-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Fredoka:wght@300..700&family=Inconsolata:wght@200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
            rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Fredoka:wght@300..700&family=Inconsolata:wght@200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
            rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Fredoka:wght@300..700&family=Inconsolata:wght@200..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&display=swap"
            rel="stylesheet">
    <link rel="stylesheet" href="Contact.css"/>
</head>

<body>
<?php include 'includes/header.php'; ?>
<!-- Hero Section -->
<section class="bg-light py-5 hero-section">
    <div class="container text-center text-white">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">Contact</h1>
                <p class="lead mt-3">
                    <a href="Home.html" class="hover">Home</a> / Contact
                </p>
            </div>
        </div>
    </div>
</section>

<div class="map">
    <iframe width="60%" height="600"
            src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=52.70967533219885, -8.020019531250002&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

</div>
<div class="contact">
    <div class="contact-ways">
        <div class="phone-card">
            <div class="phone-icon">
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="content-text">
                <h2>Phone</h2>
                <div class="phone-number">
                    <p>Toll-Free: 0803 - 080 - 3081
                        Fax: 0803 - 080 - 3082</p>
                </div>
            </div>
        </div>
        <div class="email-card">
            <div class="email-icon">
                <i class="fa-solid fa-envelope" width="400"></i>
            </div>
            <div class="content-text">
                <h2>Email</h2>
                <div class="email-address">
                    <p>mail@example.com
                        support@example.com</p>
                </div>
            </div>
        </div>
        <div class="address-card">
            <div class="address-icon">
                <i class="fa-solid fa-location-arrow" width="400"></i>
            </div>
            <div class="content-text">
                <h2>Address</h2>
                <div class="location-address">
                    <p>No: 58 A, East Madison Street,
                        Baltimore, MD, USA 4508</p>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-form">
        <h2>Contact Form</h2>
        <form action="inserto.php" method="post">
            <input type="text" name="user_name" placeholder="Name" id="name" required>
            <input type="email" name="user_email" placeholder="Email" id="email" required>
            <input type="tel" name="user_phone" placeholder="Phone number" id="phopho" required>
            <input type="text" name="user_comment" placeholder="Type a comment.." id="comment" required>
            <input class="submit" name="submit" value="submit" id="submit">

        </form>

    </div>
</div>
<?php include 'includes/footer.php'; ?>

</body>

</html>