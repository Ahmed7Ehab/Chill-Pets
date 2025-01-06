<div class="footer">

    <style>

        .footer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            background-color: #f8f9fa;
            padding: 40px 20px;
            margin-top: 80px;
        }

        .footer > div {
            flex: 1 1 calc(20% - 20px); /* 5 columns on large screens */
            min-width: 200px; /* Ensure columns don’t shrink too small */
            margin: 10px;
        }

        .footer h2 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #333;
        }

        .footer a {
            display: block;
            margin: 5px 0;
            text-decoration: none;
            color: #555;
            font-size: 16px;
        }

        .footer p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        .footer .social-media i {
            margin: 0 10px;
            font-size: 18px;
            color: #555;
            cursor: pointer;
        }

        .footer .social-media i:hover {
            color: #f59b26;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .footer {
                flex-direction: column;
                align-items: center;
            }

            .footer > div {
                flex: 1 1 100%; /* Full width on small screens */
                text-align: center;
            }

            .footer a, .footer p {
                font-size: 16px;
            }

            .footer .social-media i {
                margin: 0 5px;
            }
        }

    </style>
    <div class="about-us">
        <div class="about-us-text">
            <h2>About Us</h2>
        </div>
        <div class="about-us-paragraph">
            <p>When I look into the eyes of an animal I do not see an animal. I see a living being. I see a friend. I
                feel a soul. Since they can't speak, let us become their voice!</p>
        </div>
        <div class="social-media">
            <i class="fa-brands fa-twitter hover" id="twt"></i>
            <i class="fa-brands fa-facebook hover" id="fb"></i>
            <i class="fa-brands fa-pinterest hover" id="pin"></i>
            <i class="fa-brands fa-instagram hover" id="insta"></i>
        </div>
    </div>

    <div class="links">
        <div class="links-text">
            <h2>Links</h2>
        </div>
        <div class="links-links">
            <a href="#">Search</a>
            <a href="#">Help</a>
            <a href="#">Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Shipping Details</a>
        </div>
    </div>
    <div class="help">
        <div class="help-text">
            <h2>Help</h2>
        </div>
        <div class="help-links">
            <a href="about.php">About Us</a>
            <a href="#">Careers</a>
            <a href="#">Refund & Return</a>
            <a href="#">Deliveries</a>
        </div>
    </div>

    <div class="information">
        <div class="information-text">
            <h2>Information</h2>
        </div>
        <div class="information-links">
            <a href="#">Search Terms</a>
            <a href="#">Advanced Search</a>
            <a href="#">Help & FAQs</a>
            <a href="#">Store Location</a>
            <a href="#">Order & Return</a>
        </div>
    </div>

    <div class="contact-us">
        <div class="contact-us-text">
            <h2>Contact Us</h2>
        </div>
        <div class="contact-us-links">
            <p><i class="fa-solid fa-house" id="house"></i> No: 58 A, East Madison Street,</p>
            <p><i class="fa-solid fa-phone" id="phone"></i> 0000 - 123456789</p>
            <p><i class="fa-solid fa-clock" id="clock"></i> 9.30AM - 7.30PM</p>
            <p><i class="fa-solid fa-envelope" id="mail"></i> mail@example.com</p>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>