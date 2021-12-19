<?php
require('../db_config.php');
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$loggedin = $_SESSION['loggedin'];
?>
<html>
	<head>
		<title>Main Page</title>	
	</head>
	<body>
		<h1>Welcome to 4 Year Planner <?= $username ?></h1>
		<div style='text-align: center'>
			<?php
			//If the user is logged in displays logout link
			if($loggedin == 1){
			?>
				<p><a href='logout.php'>Logout</a></p>
			<?php
			}
			//If the user is not logged in, displays login lik
			else{
			?>
				<p><a href='login.php'>Login</a></p>
			<?php
			}
			?>
		</div>
	</body>
</html>
