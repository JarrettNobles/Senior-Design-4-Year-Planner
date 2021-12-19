<?php
//Creates the database connection and places the connection in variable '$con'
require('db_config.php');
session_start();
$username = $_SESSION['username'];
$loggedin = $_SESSION['loggedin'];
$userid = $_SESSION['userid'];

?>
<html>
        <head>
<!-- Bootstrap -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- -->
                <title>Advisor Page</title>
	</head>
	<style>
		.cntrdiv{
			margin: auto;
			width: 40%;
			border-left: 5px solid black;
			border-right: 5px solid black;
			height: 89%;
		}
	</style>
        <body>
<!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- -->
<?php 
	require('anav.php');
	echo '<div class="cntrdiv"><h1 style="text-align: center;"> Welcome to 4 Year Planner, ' .$username. '. </h1>';	
	$advsql = "SELECT Users.First, Users.Last, Students.Major, Students.Minor FROM Users INNER JOIN Students ON Users.Username = Students.MUID WHERE Students.AdvisorID = '$userid'";
	$result = mysqli_query($con, $advsql);
	$num_rows = mysqli_num_rows($result);
	if($result->num_rows >0) {
		//	$row = $result->fetch_assoc();
		echo '<h3 style="margin: 20px;"> Students: </h3><table style="margin: auto; border: 1px solid black; text-align: center;"><tr style="border: 1px solid black;"><th style="width: 125px;"> First Name </th><th style="width: 125px; border: 1px solid black;"> Last Name </th><th style="width:70px; border: 1px solid black;"> Major </th><th style="width: 70px;"> Minor </th><th style="width: 100px; border: 1px solid black;">Plan</th></tr>';
		while ($row = $result->fetch_assoc()){
		echo '<tr style="border: 1px solid black;"><td style="text-align: left;">' .$row['First']. '</td><td style="border: 1px solid black; text-align: left;">' .$row['Last']. '</td><td>' .$row['Major']. '</td><td style="border: 1px solid black;">' .$row['Minor']. '</td><td>view plan</td></tr>';
		}
		echo "</table>";
	}
	else {
		echo "0 students";
	}
?>
		</div>
        </body>
</html>


