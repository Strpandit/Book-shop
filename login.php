<?php

session_start();
   if(isset($_POST['loginbtn'])){

      include "connect.php";

$email = $password = "";
$email_err = $password_err = $incorrect = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
if(empty($_POST['email'])){
   $email_err = "email are required";
} elseif(empty($_POST['password'])){
   $password_err = "password are required";
} else{
   $sql = "select * from register where email='$email' AND password= '$password' AND role='$role'" ;

   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) ===1){
      $row = mysqli_fetch_assoc($result);
      header("location: cart.html");
   } else{
      echo "Invalid Credentials";
      $incorrect = "Incorrect password";
   }
}
}
}
?>