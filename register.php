<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <div class="form-container p-4">
                <!-- Overlay -->
                <div class="form-overlay"></div>
                <!-- Form Content -->
                <div class="form-content">
                    <h1 class="text-center mb-4 text-light">Register Form</h1>
                    <form action="home.html" method="post">
                        <!-- Name -->
                        <div class="form-group">
                            <label for="user_name" class="text-light">Name</label>
                            <input type="text" id="user_name" name="user_name" class="form-control"
                                   placeholder="Enter your name" required/>
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label for="user_email" class="text-light">Email</label>
                            <input type="email" id="user_email" name="user_email" class="form-control"
                                   placeholder="Enter your email" required/>
                        </div>
                        <!-- Phone -->
                        <div class="form-group">
                            <label for="user_phone" class="text-light">Phone Number</label>
                            <input type="tel" id="user_phone" name="user_phone" class="form-control"
                                   placeholder="Enter your phone number" required/>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="user_password" class="text-light">Password</label>
                            <input type="password" id="user_password" name="user_password" class="form-control"
                                   placeholder="Enter your password" required/>
                        </div>
                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="confirm_password" class="text-light">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control"
                                   placeholder="Confirm your password" required/>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
