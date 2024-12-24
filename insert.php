<?php

$host = 'localhost';
$db = 'chill_data';
$user = 'root';
$pass = '';

try {

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstName= htmlspecialchars(trim($_POST['first_name']));
    $lastName = htmlspecialchars(trim($_POST['last_name']));
    $email    = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone    = htmlspecialchars(trim($_POST['phone']));
    $address  = htmlspecialchars(trim($_POST['address']));
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];


    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword)) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    if (strlen($phone) != 11 || !ctype_digit($phone)) {
        die("Invalid phone number. It must be 11 digits.");
    }


    $hashedPassword = sha1($password);

    try {

        $sql = "INSERT INTO users (first_name, last_name, email, phone, address, password) 
                VALUES (:first_name, :last_name, :email, :phone, :address, :password)";

        $stmt = $pdo->prepare($sql);


        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name' , $lastName);
        $stmt->bindParam(':email'     , $email);
        $stmt->bindParam(':phone'     ,$phone);
        $stmt->bindParam(':address'   , $address);
        $stmt->bindParam(':password'  , $hashedPassword);
        $stmt->execute();

        header('location:login.php');
    } catch (PDOException $e) {

        if ($e->getCode() == 23000) {
            echo "The email is already registered.";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
