<?php 
if(isset($_POST['submit']))
{
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $phone = $_POST['user_phone'];
    $comment = $_POST['user_comment'];
    $conn = mysqli_connect("localhost","root","","userdata");
    if(!$conn) echo mysqli_connect_error();
    
    $query = "INSERT INTO `data`(`name`, `email`, `phone`, `comment`) VALUES ('$name','$email','$phone','$comment')";
mysqli_query($conn,$query);

}

?>