<?php
session_start();
if(!isset($_SESSION['aemail']))//m4 3aml login
{
   header('Location: admLogin.php'); 
}
?>
<!DOCTYPE html>

<html>
  <head>
	<title>Company Name</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link rel="stylesheet" type="text/css" href="css/styletasks.css">


  </head>
<body>

<header>
		<nav>
			<h1>Company Name</h1>
			<ul id="navli">
				<li><a class="homered" href="allTasks.php">All Tasks</a></li>
				<li><a class="homeblack" href="viewEmployees.php">View Employees</a></li>
				<li><a class="homeblack" href="out.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	
    <div class="divider"></div>
    

    <h2 class="task_title" >Empolyee Leaderboard</h2>
    <div style="text-align: center";>
    <a class="btn btn-info" href="addTask.php" role="button">add task</a>
    </div> <br/>
    <table>

			<tr bgcolor="#000">
				<th align = "center">emp_id</th>
				<th align = "center">emp_name</th>
				<th align = "center">Task name</th>
				<th align = "center">Desc</th>
				<th align = "center">ststus</th>
				<th align = "center">Deadline</th>
				<th align = "center">Action</th>

            </tr>
     <?php include "db_conn.php";
        $query= "SELECT tasks.em_id as num,tasks.task_id as id, emploey.name as name, tasks.task_name as taskName, tasks.de as d, tasks.status as s, tasks.deadline as dl
        FROM tasks JOIN emploey
        ON tasks.em_id = emploey.id";
        $result=$conn->query($query);
        while($row=$result->fetch_assoc()){?>       
            <tr>
                <td><?php echo $row['num'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['taskName'];?></td>
                <td><?php echo $row['d'];?></td>
                <td><?php echo $row['s'];?></td>
                <td><?php echo $row['dl'];?></td>
                <td><a class="btn btn-dark" href="edit.php?task_id=<?php echo $row['id']?>" role="button">Edit</a><a class="btn btn-danger" href="delete.php?task_id=<?php echo $row['id']?>" role="button">delete</a>

            </tr>
            <?php }?>

	</table>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script> 

  </body>
</html>


