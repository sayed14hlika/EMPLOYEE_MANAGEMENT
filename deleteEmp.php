<?php
include "db_conn.php";
$query = "DELETE FROM `emploey` WHERE id ='".$_GET['em_id']."'";


if(mysqli_query($conn, $query) ==true)
{
    header("Location: viewEmployees.php");
    exit();
}else
{
    echo "wrong";
}