<?php
//Creates the database connection and places the connection in variable '$con'
require('db_config.php');
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$loggedin = $_SESSION['loggedin'];
if($loggedin != 1){
header("location: login.php");
}
?>
<html>
	<style>
		h1 {font-weight:bold;
		text-align:center;
		line-height: 100px;

		}
		
		.logo {text-align:center;
		margin: auto;
		border-radius:20%;
		position:relative;
		top: 100px;
		width: auto;
		}
		.CampusPic2{text-align:center;
		margin: auto;
		border-radius: 50%;
		position: relative;

		}

		.footer{width:100%;
		height:60px;
		background: #101010;
		padding: 5px 0;
		color: #FFFFFF;
		border-top:20px solid #e9692c;
		position: absolute;
		bottom:0;
		text-align:center;
		} 

			
	</style>

	<head>
<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- -->
		<title>Home Page</title>	
	</head>
	<body>
	
<!-- Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- -->
	<?php require('navbar.php'); ?>
<?php
	$first_name = "SELECT First FROM Users WHERE Username = '$username'";
	$result = mysqli_query($con, $first_name);
	$row = $result->fetch_assoc();
	$name = $row['First'];

	echo "<h1>Welcome to the Mercer University 4 Year Planner $name</h1>";
?>

			<div class='CampusPic2'>
				<img src="/Photos/Campus2.png" alt="Campus Picture" height=400px max-width:200px>
			</div>	

			<div class='logo'>
				<img src="/Photos/mercer-university-logo2.png" alt="MU Logo" height= 100px max-width: 50px border-radius:50%>
			</div>
			
		
	</body>
	<footer>
		<div class=footer>
		<p>Made by Willow, Ian, Andy, Tiana, Jonathan, and Jarrett </p>
		</div>
</html>
