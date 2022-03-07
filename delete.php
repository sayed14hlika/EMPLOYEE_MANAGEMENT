<?php
include "db_conn.php";
$query = "DELETE FROM `tasks` WHERE task_id ='".$_GET['task_id']."'";


if(mysqli_query($conn, $query) ==true)
{
    header("Location: allTasks.php");
    exit();
}else
{
    echo "wrong";
}