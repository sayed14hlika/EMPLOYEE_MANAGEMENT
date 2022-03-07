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
$query = "UPDATE `tasks` SET em_id=$emp_id ,task_name='$task_name' ,de='$desc',deadline='$deadline',status='$status' WHERE task_id ='".$_GET['task_id']."'";


if(mysqli_query($conn, $query) ==true)
{
    header("Location: allTasks.php");
    exit();
}else
{
    echo "wrong";
}