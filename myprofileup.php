<?php
include "db_conn.php";
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];
$city = $_POST['city'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$id = $_GET['id'];
$img = $_FILES['image'];
$imgName=$img['name'];
$imgType=$img['type'];
$tmpName=$img['tmp_name'];
$size=$img['size'];
$targetFolder="profile_pic/";
$imageName=time().$size.time().$imageName;

$path=$targetFolder.$imageName;
if(move_uploaded_file($tmpName,$path)==true)
{
    echo "uploaded successfully <br/>";
}else{
    echo "some error <br/>";
}

if(!empty($_FILES['image'])){
$query = "UPDATE `emploey` SET name='$name',email='$email',password='$pass',city='$city',gender='$gender',phone='$phone',pic='$path'
WHERE id = $id";


if(mysqli_query($conn, $query) ==true)
{
    header("Location: myTasks.php");
    exit();
}else
{
    echo "wrong";
}
}else{
    $query = "UPDATE `emploey` SET name='$name',email='$email',password='$pass',city='$city',gender='$gender',phone='$phone'
    WHERE id = $id";


if(mysqli_query($conn, $query) ==true)
{
    header("Location: myTasks.php");
    exit();
}else
{
    echo "wrong";
}
}
