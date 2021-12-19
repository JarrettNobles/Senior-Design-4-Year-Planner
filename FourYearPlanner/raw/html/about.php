<?php
require('db_config.php');
session_start();
$username = $_SESSION['username'];
if($_SESSION['loggedin'] != 1){
	header('location: login.php');
}
?>
<html lang='en'>
	<style>

	.footer{
	width:100%;
	height::60px;
	background:#101010;
	padding:5px 0;
	color:#FFFFFF;
	border-top: 20px solid #e9692c;
	position: absolute;
	bottom:0;
	text-align:center;	
	}
	
	h2{
	font-weight:bold;
	text-align:center;
	line-height: 100px;
	}

	.logo{
	text-align:center;
	margin:auto;
	border-radius: 20%;
	position: relative;
	top: 100px;
	width: auto;
	}
	</style>

	<head>
	<meta charset="UTF-8">
	<meta name='viewport' content="width-device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<title>About Us</title>
	</head>
	<body>
	<?php require('navbar.php');?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<div class='container'>
		<h2>About</h2>
		<p>This website’s goal is to make the creation of a 4 Year Plan easy and convenient. It can be used in tandem with the freshman course UNV 101. This website was created by students, for students, to make their college experience easier.</p>

		<h2>Use</h2>
		<p>To get started, select your major and minor  with the Change Program option above. Have your Mercer catalog (the book you got from your UNV class) handy to help you choose your gen ed  and elective major/minor courses from the generated list.</p>
	</div>
	<div class='logo'>
		<img src= "/Photos/mercer-university-logo2.png" alt="MU Logo" height= 100px max-width: 50px border-radius:50%>
	</div>
	</body>

	<div class=footer>
	<p> Made by Willow, Ian, Tian, Jonathan, and Jarrett</p>
	</div>
</html>
