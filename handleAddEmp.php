<?php
include "db_conn.php";
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$gender = $_POST['gender'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$bd = $_POST['birthday'];


$query = "INSERT INTO `emploey`(`name`, `email`, `password`, `city`, `gender`, `phone`, `birthday`) VALUES ('$name', '$email','$pass', '$city','$gender','$phone','$bd')";


if(mysqli_query($conn, $query) ==true)
{
    header("Location: viewEmployees.php");
    exit();
}else
{
    echo "wrong";
}
