<!DOCTYPE html>
<?php
//Establishes connection to database and starts session
//Call to connection with variable '$con'
require('db_config.php');
session_start();
?>
<html>
	<head>
<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- -->
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width', 'initial-scale=1'>
		<title>Login</title>
	</head>
<style>

body {background-color: #white;}
form {border: none;}

input[type=text], input[type=password] {
width: 95%;
padding:20px 20px;
margin: 9px 0;
display: block;
border: 5px solid;
box-sizing: border-box;
margin-right: auto;
margin-left: auto;
}

input[type=submit] {
background-color: #e5e4e2;
color: black;
padding: 10px 10px;
margin: 5px 0;
width: 23.75%;
border: none;
cursor: pointer;
display: block;
margin-right: auto;
margin-left: auto;
}

input[type=submit]:hover {
opacity: 0.9;
}

.container {
max-width: 500px;
margin: auto;
padding: 15px;
border: 15px solid;
background-color: #e9692c;

}
.image {
text-align: center;
padding: 10px;
margin: 24px 0 12px 0;
}

img.Mercer {
width: 25%;
height: 25%;
border: none;
border-radius: 50%;
border-width: 5px 4px;
}

.pic {
text-align: center;
}

img.logo {
width: 20%
}

p {
font-size: 15px;
}
</style>
	<body style="">
<!-- Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- -->
<div class='image'>
	<img src="/Photos/IMG_7387.png"alt= "mercer" class="Mercer">
</div>
		<div class='container'>
	
		
			<h1><center>Login</center></h1>
			<form action='' method='post' name='login'>
				<label for="username"><b>Username (MUID):</b></label>
				<input type='text' name='username' placeholder='Enter Username (MUID)'>
				<label for="password"><b>Password:</b></label>
				<input type='password' name='password' placeholder='Enter Password'>
				<input type='submit' value='Login'>
			</form>

		</div>
	<div>
		<p><center><i>Need an Account?</i> Create one <a href='register.php'>here.</a</center></p>

		</div>
<div class= 'pic'>
	<img src="/Photos/mercer-university-logo-vector.png" alt= "logo" class="logo">
</div>
	</body>
</html>
<?php
//Starts authentication
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	//Removes any whitespace in input and places into variables
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	//Creates and runs query to check for user
	$query = "SELECT * FROM Users WHERE Username = '$username'";
	$result = mysqli_query($con,$query);
	$numRows = mysqli_num_rows($result);

	//If the user exists the password hash is retrieved
	if($numRows == 1){
		$row = $result->fetch_assoc();
		$retrieved_pass = $row['Password'];

		//Verifies the passwords match and creates session variables if they do
		if(password_verify($password, $retrieved_pass)){
//			$_SESSION['userid'] = $row['UserID'];
// if statement and query for advisors
			$query2 = "SELECT * FROM Advisors WHERE UserName = '$username'";
			$result2 = mysqli_query($con, $query2);
			$numRows2 = mysqli_num_rows($result2);
			if ($numRows2 ==1){
				$row2 = $result2->fetch_assoc();
				$_SESSION['username'] = $row2['FirstName'];
				$_SESSION['userid'] = $row2['AdvisorID'];
				$_SESSION['loggedin'] = 1;
				header('location: advisor.php');
			}
			else{			
			$_SESSION['username'] = $row['Username'];
			$_SESSION['loggedin'] = 1;
			header('location: index.php');
			}
		}
		//If the password is wrong
		else{
			echo "<script>alert('Incorrect Password');</script>";
			die();
		}
	}
	//If the username entered does not exist
	else{
		echo "<script>alert('Username not found');</script>";
		die();
	}
}
?>
