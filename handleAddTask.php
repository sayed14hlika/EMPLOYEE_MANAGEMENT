<?php
include "db_conn.php";
$emp_name = $_POST['emp_name'];
$task_name = $_POST['task_name'];
$desc = $_POST['desc'];
$status = $_POST['status'];
$deadline = $_POST['deadline'];
$sql = "SELECT id FROM emploey WHERE name='$emp_name'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$emp_id = $row['id'];
$query = "INSERT INTO `tasks`(`em_id`, `task_name`, `de`, `status`, `deadline`) VALUES($emp_id, '$task_name', '$desc','$status', '$deadline')";


if(mysqli_query($conn, $query) ==true)
{
    header("Location: allTasks.php");
    exit();
}else
{
    echo "wrong";
}

