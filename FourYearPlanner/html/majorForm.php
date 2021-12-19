<?php
session_start();
require("db_config.php");
$muid = $_SESSION['username'];
if($_SESSION['loggedin'] != 1){
	header('location = login.php');
}
?>
<!doctype html>
<html lang='en'>
	<style>
	select{
	font-weight:bold;
	text-align:center;
	text-color:#101010;
	border-radius: 4px;
	border: none;

	}		
	
	input[type=submit]{
	font-weight:bold;
	text-align:center;
	}

	</style>


	<head>
<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- -->
		<title>Major/Minor Declaration</title>
	</head>
	<body>
	<?php require('navbar.php'); ?>
<!-- Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- -->
		<div>
			<form method='post' action='' name='declareform'>
				<select name='major' required>
					<option value='' selected disabled>Major</option>
					<?php
					$majors = "SELECT * FROM Majors";
					$result = mysqli_query($con, $majors);
					while($row = mysqli_fetch_array($result)){
						$major_id = $row["MajorID"];
						$major_name = $row['Title'];
					?>
						<option value="<?= $major_id ?>"><?= $major_name ?></option>
					<?php
					}
					?>
				</select>
				<select name='minor' required>
					<option value='' selected disabled>Minor</option>
					<?php
					$minors = "SELECT * FROM Minors";
					$result2 = mysqli_query($con, $minors);
					while($row2 = mysqli_fetch_array($result2)){
						$minor_id = $row2['MinorID'];
						$minor_name = $row2['Title'];
					?>
						<option value='<?= $minor_id ?>'><?= $minor_name ?></option>
					<?php
					}
					?>
					<input type='submit' value='Change' name='change_program' class='form-control'>
				</select>
			</form>
		</div>
	</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$major = $_POST['major'];
	if(isset($_POST['minor'])){
		$minor = $_POST['minor'];
		$update_student = "UPDATE Students SET Major = '$major', Minor = '$minor' WHERE MUID = '$muid'";
		mysqli_query($con, $update_student);
	}
	else{
		$update_student = "UPDATE Student SET Major = '$major' WHERE MUID = '$muid'";
	}
}
?>
