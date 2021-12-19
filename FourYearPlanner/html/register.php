<?php
//Opens the conncection to the database
require('db_config.php');
//$con = new mysqli('localhost', 'debian-sys-maint', 'uvgtRjByaOZlfIUv', '4YearPlanner');
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<html lang='en'>
	<head>
<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- -->
		<style>
			.fixed-header{
			width: 100%;
			height: 8%;	
			background: #101010;
			padding: 5px 0;
			color:#FFFFFF;
			border-bottom:40px solid  #e9692c;
			}
					
			h2 {font-weight: bold;
			font-size:30px;
			padding-top:50px;
			position:relative;
			top:-70px}

			h3 {font-weight: bold;
			font-size:30px;
			padding-top:10px;
			position:relative;
			top:-90px;}

			input[type=text],input[type=username]{
			width: 95%;
			padding: 20px 20px;
			margin: 9px 0;
			display: block;			
			border: 5px solid;
			box-sizing: border-box;
			margin-right: auto;
			margin-left: auto;
			position:relative;
			top:-80px;
			border-color:#000000;
			}

			input[type=email],input[type=email]{
			width: 95%;
			padding:20px 20px;
			margin: 9px 0;
			display: block;
			border: 5px solid;	
			box-sizing: border-box;
			margin-right: auto;
			margin-left: auto;
			position:relative;
			top:-80px;
			border-color#000000;
			}

			input[type=password],input[type=pass1]{
			width:95%;
			padding:20px 20px;
			margin: 9px 0;
			display: block;
			border: 5px solid;
			box-sizing: border-box;
			margin-right: auto;
			margin-left: auto;
			position:relative;
			top:-80px;
			border-color: #000000;	
			}

			input[type=password],input[type=pass2]{
			width:95%;
			padding: 20px 20px;
			margin: 9px 0;
			display: block;
			border: 5px solid;
			box-sizing: border-box;
			margin-right: auto;
			margin-left: auto;
			position:relative;
			top:-80px;
			border-color:#000000;
			}

			#advdiv{
			width: 95%;
			padding: 20px 20px;
			margin: 9px 0;
			display: block;
			border: 5px solid;
			margin-right: auto;
			margin-left: auto;
			position: relative;
			top: -80px;
			border-color: #000000;
			}

			form{font-size:30px;
			position:relative;
			top:-10px;
			}

			.logo {
			text-align:center;
			margin: 24px 0 12px 0;
			border-radius:20%;
			position: relative;
			top: -24px;		
			}

		
					
				
		</style>
			
		<meta charset='UTF-8'>
		<meta name='viewport' content='width-device-width, initial-scale=1'>
<!-- Old Bootstrap CSS 
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDdbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
-->
<!-- Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- -->
		<title>Create an Account</title>

	</head>
	<body>
		<div class="fixed-header">
		</div>
	
		<div class= 'logo'>
		<img src= "/Photos/mercer-university-logo-vector.png" alt= logo height=200px max-width= 100px border-radius:50%;>
		</div>
			
		<div style='text-align: center;' class='container'>
			<div id="wrapper"class="float" >
			<h2>Create an Account</h2>
			navbar navbar-expand-lg navbar-dark bg-dark
			<h3>To register for an account, please enter the information requested below.</h3>
			<form action='' method='post' name='register' class="needs-validation">
				<div class="mb-3" id="username">
					<input type='text' name='username' placeholder='MUID' class='form-control' required>
				</div>
				<div class='mb-3' id='firstName'>
					<input type='text' name='first' placeholder='First Name' class='form-control' required>
				</div>
				<div class='mb-3' id='lastName'>
					<input type='text' name='last' placeholder='Last Name' class='form-control' required>
				</div>
<!-- now username		<div class='mb-3' id='studentid'>
					<input type='text' name='stuid' placeholder='Student ID' class='form-control' required>
				</div>
-->
				<div class='mb-3' id='email'>
					<input type='email' name='email' placeholder='Email Address' class='form-control' required>
				</div>
				<div class='mb-3' id='pass1'>
					<input type='password' name='pass1' placeholder='Password' class='form-control' required>
				</div>
				<div class='mb-3' id='pass2'>
					<input type='password' name='pass2' placeholder='Password Confirm' class='form-control' required>
				</div>
				<div class="form-group" id="advdiv">
					<label style="font-size: 20px;" for="adv"> Select Advisor: </label>
					<select class="form-control" name="adv"  id="adv">
						<option value="" selected disabled>Please choose your advisor</option>
					<?php 
						$advisor = mysqli_query($con, "SELECT AdvisorID, LastName FROM Advisors");
						while ($row = $advisor->fetch_assoc()){
						echo '<option value="' . $row['AdvisorID'] . '">' . $row['LastName'] . '</option>';
						}		
					?>
					</select>		
				</div>
				<br><br>
				<input style='text-align: center; position: relative; top: -140px;' type='submit' value='Create Account'>
			</form>
			</div>
			<div style= 'text-align: center; position: relative; top: -180px; font-size:20px;'>
				<p>Already have an account? Login <a href="login.php">here</a>.</p>
		
			</div>
		
		</div>
		 	
		<!-- Old Bootstrap JavaScript Bundle
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>	
-->

	</body>

</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

// edit for MUID to work for username

	$username = trim($_POST["username"]);
	$first = $_POST["first"];
	$last = $_POST["last"];
//	$studentid = trim($_POST["stuid"]);
	$email = trim($_POST["email"]);
	$pass1 = trim($_POST["pass1"]);
	$pass2 = trim($_POST["pass2"]);
	$advID = $_POST["adv"];

	//Checks if there is a duplicate username in the database
	$checkDuplicate = "SELECT Username from Users WHERE Username = '$username'";
	$countRow = mysqli_query($con,$checkDuplicate);
	$numRows = mysqli_num_rows($countRow);

	if($numRows == 1){
//		echo "<script>alert('Username is taken');</script>";
		echo "<script>alert('Account already exists.');</script>";
		die();
	}
	//If the passwords are identical, it is hashed and the user is placed into the database
	if($pass1 === $pass2){
		$password_hash = password_hash($pass1, PASSWORD_DEFAULT);
		$insertUser = "INSERT INTO Users (Username, First, Last, Email, Password) VALUES ('$username', '$first', '$last', '$email', '$password_hash')";
// adds record for student profile
		$insertStudent = "INSERT INTO Students (MUID, AdvisorID) VALUES ('$username', '$advID')";

		mysqli_query($con, $insertUser);
		mysqli_query($con, $insertStudent);
		header('location: login.php');
	}
	else{
		echo "<script>alert('Passwords do not match');</script>";
	}
}
?>
