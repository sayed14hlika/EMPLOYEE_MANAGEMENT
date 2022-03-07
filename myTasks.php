<?php
session_start();
if(!isset($_SESSION['email']))//m4 3aml login
{
   header('Location: empLogin.php'); 
}
$m = $_SESSION['email'];
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
<?php $e = $_SESSION['email'];
?>
<header>
		<nav>
            
			<?php include "db_conn.php";
                                        $query= "SELECT * FROM `emploey`
                                        WHERE email = '$m'";
                                        $result=$conn->query($query);
                                        $r2 =$result->fetch_assoc();
                                        ?>
            <h1><img src="<?php echo $r2['pic']; ?>" style="border-radius: 10%; width:35px;"><?php echo $r2['name']; ?></h1>
			<ul id="navli">
				<li><a class="homered" href="myTasks.php">My Tasks</a></li>
				<li><a class="homeblack" href="">Chat</a></li>
				<li><a class="homeblack" href="myProfile.php">My profile</a></li>
				<li><a class="homeblack" href="out.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>


    <h2 class="task_title" >Empolyee Leaderboard</h2>
      
    
    <table>

			<tr bgcolor="#000">
				<th align = "center">emp_id</th>
				<th align = "center">Task name</th>
				<th align = "center">Description</th>
				<th align = "center">Status</th>
                <th align = "center">Deadline</th>
				<th align = "center">Action</th>

				
            </tr>
            <?php include "db_conn.php";
        $query= "SELECT tasks.em_id as num,tasks.task_id as id, emploey.name as name, tasks.task_name as taskName, tasks.de as d, tasks.status as s, tasks.deadline as dl
        FROM tasks JOIN emploey
        ON tasks.em_id = emploey.id
        where email = '$e'";
        $result=$conn->query($query);
        while($row=$result->fetch_assoc()){?>
            <tr>
                <td><?php echo $row['num'];?></td>
                <td><?php echo $row['taskName'];?></td>
                <td><?php echo $row['d'];?></td>
                <td><?php echo $row['s'];?></td>
                <td><?php echo $row['dl'];?></td>
                <td><?php if($row['s'] == 'completed'){?>
                <a class="btn btn-danger" href="hBack.php?task_id=<?php echo $row['id']?>" role="button">back</a>
                <?php }
                    if($row['s'] == 'in_process'){?>
                    <a class="btn btn-dark" href="hDone.php?task_id=<?php echo $row['id']?>" role="button">Done</a>
                <?php }?>
                
                </td>


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


