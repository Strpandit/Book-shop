<?php
$dbserver="localhost";
$dbuser="root";
$dbpass="";
$db="bookseller";

$conn=mysqli_connect($dbserver,$dbuser,$dbpass,$db);

if(! $conn){
    die('connection failed');
}
?>