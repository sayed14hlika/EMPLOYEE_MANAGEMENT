<?php
include "db_conn.php";
$q = "UPDATE tasks SET status = 'in_process' WHERE task_id = '".$_GET['task_id']."'";
if(mysqli_query($conn, $q) ==true)
{
    header("Location: myTasks.php");
    exit();
}else
{
    echo "wrong";
}