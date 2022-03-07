<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) &&isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
    

	if (empty($email)) {
		header("Location: admLogin.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: admLogin.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admins WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
            	$_SESSION['aemail'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: allTasks.php");
		        exit();
            }else{
                
				header("Location: admLogin.php?error=Incorect User name or password");
		        exit();
			}
		}else{
            

			header("Location: admLogin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
    
	header("Location: admLogin.php");
	exit();
}
?>