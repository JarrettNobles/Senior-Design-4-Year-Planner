<?php
require('db_config.php');
session_start();
$username = $_SESSION['username'];
if($_SESSION['loggedin'] != 1){
	header('location: login.php');
}
?>
<html lang='en'>
	<head>
	<meta charset="UTF-8">
	<meta name='viewport' content="width-device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<style>

	.footer{
	width:100%;
	height:60px;
	background:#101010;
	padding: 5px 0;
	color:#FFFFFF;
	border-top:20px solid #e9692c;
	position:absolute;
	bottom:0;
	text-align:center;
	}
	
	h3{
	font-weight:bold;
	}

	</style>

	<title>User Profile</title>
	</head>
	<body>
	<?php require('navbar.php');?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<div class='container'>
	<?php
	$stu_info = "SELECT * FROM Students WHERE MUID = '$username'";
	$stu_result = mysqli_query($con, $stu_info);
	$stu_row = $stu_result->fetch_assoc();
	$major = $stu_row['Major'];
	$minor = $stu_row['Minor'];
	$advisorid = $stu_row['AdvisorID'];
	$adv_info = "SELECT FirstName, LastName FROM Advisors WHERE AdvisorID = '$advisorid'";
	$adv_result = mysqli_query($con, $adv_info);
	$adv_row = $adv_result->fetch_assoc();
	$afirst = $adv_row['FirstName'];
	$alast = $adv_row['LastName'];
	$stu_info = "SELECT * FROM Users WHERE Username = '$username'";
	$stu_result = mysqli_query($con, $stu_info);
	$stu_row = $stu_result->fetch_assoc();
	$first = $stu_row['First'];
	$last = $stu_row['Last'];
	$email = $stu_row['Email'];
	?>
		<h3>Your Information</h3>
		<p>MUID: <?= $username ?></p>
		<p>First: <?= $first ?></p>
		<p>Last: <?= $last ?></p>
		<p>Email: <?= $email ?></p>
		<p>Advisor: <?= $afirst ?>  <?=$alast ?></p>
	</div>

	<div class='container'>
	<?php
	$prog_info = "SELECT * FROM Majors WHERE MajorID = '$major'";
	$prog_result = mysqli_query($con, $prog_info);
	$prog_row = $prog_result->fetch_assoc();
	$name = $prog_row['Title'];
	$school = $prog_row['School'];

	$prog_info = "SELECT * FROM Minors WHERE MinorID = '$minor'";
	$prog_result = mysqli_query($con, $prog_info);
	$prog_row = $prog_result->fetch_assoc();
	$name2 = $prog_row['Title'];
	?>
		<h3>Your Current Program</h3>
		<p>School: <?= $school ?></p>
		<p>Major: <?= $name ?></p>
		<p>Minor: <?= $name2 ?></p>
	</div>
	
	</body>
	<div class=footer>
		<p>Made by Willow,Ian,Andy,Tiana,Jonathan,and Jarrett</p>
	</div>
</html>
