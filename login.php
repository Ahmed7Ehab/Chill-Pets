<?php

session_start();
    if(isset($_SESSION['email'])){
            header('location:home.php?you_are_logged_in_already');

    }
    include 'init.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['user_login'])) {
            $email = $_POST['user_email'];
            $password = $_POST['user_password'];
            $hashedpass=sha1($password);
            $query = "SELECT * FROM users WHERE email=? AND password=?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$email, $hashedpass]);
            $count=$stmt->rowCount();
            if ($count==1) {
               $info=$stmt->fetch();
                $_SESSION['email'] = $email;
                $_SESSION['name']= $info['first_name'];
                $_SESSION['role']= $info['role'];
                header('Location: home.php?message=Login Successful');
            }
            else{
               /*$formError[]=*/ echo 'something went wrong';
            }

        }
        if (isset($_POST['admin_login'])) {
            $email = $_POST['user_email'];
            $password = $_POST['user_password'];
            $hashedpass=sha1($password);
            $stmt = $pdo->prepare("SELECT email,password FROM users WHERE email = ? AND password = ? and role ='admin'");
            $stmt->execute(array($email, $hashedpass));
            $count=$stmt->rowCount();
            if ($count==1) {
                $info=$stmt->fetch();
                $_SESSION['email'] = $email;
                $_SESSION['name']  = $info['first_name'];
                $_SESSION['role']  = 'admin';
                header('Location: admin.php?message=Login Successful');
            }
            else{
                echo "something went wrong";
            }

        }
    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container my-5 ">
    <div class="row justify-content-center">
        <div class="col-md-6 col-12">
            <div class="form-container p-4">
                <!-- Overlay -->
                <div class="form-overlay"></div>
                <!-- Form Content -->
                <div class="form-content">
                    <h1 class="text-center mb-4 text-light">Login</h1>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <!-- Email -->
                        <div class="form-group">
                            <label for="user_email" class="text-light">Email</label>
                            <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Enter your email" required />
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="user_password" class="text-light">Password</label>
                            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter your password" required />
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block mb-6" name="user_login">Login</button>
                        <!--  <button type="submit" class="btn btn-primary btn-block mb-6" name="admin_login">Login as admin</button>-->
                        <a href="admin_login.php">Admin?</a>
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
