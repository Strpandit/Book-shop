<?php

include "connect.php";

$fname =$_POST['fname'];
$lname =$_POST['lname'];
$email =$_POST['email'];
$mobile =$_POST['mobile'];
$address =$_POST['address'];
$city =$_POST['city'];
$password =$_POST['password'];
$cpassword =$_POST['cpassword'];
$role =$_POST['role'];

$sql="insert into`bookseller`.`register`(fname,lname,email,mobile,address,city,password,cpassword,role)values('$fname','$lname','$email','$mobile','$address','$city','$password','$cpassword','$role')";

if($conn->query($sql)== true){
    
    header("location: cart.html");
}
else{
    echo "ERROR: $sql";
}
$conn->close();
?>