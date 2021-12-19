<?php
	require('db_config.php');
	session_start();
	$username = '10998715';
	if($_SESSION['loggedin'] != 1){
	header('location: login.php');
	}
?>
<html lang='en'>
	<head>
		<style>
			.boxtitle{
				width: 50%;
				display: table-cell;
				padding: 10px;
				text-align: center;
			}
			.dropbox {
				width: 50%;
				display: table-cell;
				height: 100px;
				border: 1px solid black;
			}
			.droprow {
				display: table-row;
				width: 100%;
			}
			.dragitem {
				background-color: black;
				color: white;
				position: relative;
				text-align: center;
				margin: 10px;
			}

/* on-hover text box styling*/

			.dragitem .hasPR{
				visibility: hidden;
				background-color: orange;
				text-align: center;
				top: -5px;
				left: -40%;
				width: 100%;
				position: absolute;
				padding: 5px;
				z-index: 1;
			}
			.dragitem:hover .hasPR{
				visibility: visible;
			}
			.dragitem .noPR{
				visibility: hidden;
				background-color: grey;
				text-align: center;
				top: -5px;
				left: -40%;
				width: 100%;
				position: absolute;
				padding: 5px;
				z-index: 1;
			}
			.dragitem:hover .noPR{
				visibility: visible;
			}
		</style>
		<meta charset="UTF-8">
		<meta name='viewport' content="width-device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Sample Course</title>
	</head>	
	<body>
<?php require('navbar.php'); ?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
// student info
	$stu_info = "SELECT * FROM Students WHERE MUID = '$username'";
	$stu_result = mysqli_query($con, $stu_info);
	$stu_row = $stu_result->fetch_assoc();
	$major = $stu_row['Major'];
	$minor = $stu_row['Minor'];

// courses for CLA (defaulting to INT track)
//	$cla0_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA UNV 101.','CLA INT 101.','CLA INT 201.','CLA INT 301.')";
//	$cla1_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA SPN 111.','CLA SPN 112.','CLA FRE 111.','CLA FRE 112.','CLA GER 111.','CLA GER 112.','CLA CHN 111.','CLA CHN 112.','CLA LAT 111.','CLA LAT 112.','CLA GRK 111.','CLA GRK 112.')";
//	$cla2_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA AFR 230.','CLA ENG 225.','CLA HIS 275.','CLA PHI 240.','CLA REL 110.','CLA REL 130.','CLA REL 150.','CLA REL 170.')";
//	$cla3_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA AFR 221.','CLA ART 106.','CLA ART 107.','CLA ART 108.','CLA ART 114.','CLA ART 115.','CLA ART 116.','CLA ART 117.','CLA ART 222.','CLA ART 229.','CLA ENG 221.','CLA ENG 222.','CLA ENG 226.','CLA ENG 233.','CLA ENG 234.','CLA ENG 235.','CLA ENG 237.','CLA HIS 245.','CLA JMS 220.','CLA JMS 225.','CLA JMS 230.','MUS MUS 151.')";
//	$cla3areq = "SELECT * FROM Courses WHERE CourseID IN ('MUS MUS 182.','MUS MUS 183.','MUS MUS 191.','MUS MUS 192.','MUS MUS 196.','MUS MUS 197.','CLA PHI 260.','CLA PHI 265.','CLA THR 115.','CLA THR 218.','CLA WLT 101.');";
//	$cla4_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA AFR 225.','CLA CLA 101.','CLA CLA 102.','CLA ENG 224.','CLA ENG 263.','CLA ENG 264.','CLA ENG 265.','CLA FLL 195.','CLA HIS 105.','CLA HIS 176.','CLA HIS 201.','CLA HIS 215.','CLA HIS 225.','CLA PHI 176.','CLA PHI 190.','CLA PHI 195.','CLA PHI 230.','CLA PHI 269.','CAL POL 176.','CLA REL 210.','CLA REL 230.','CLA REL 270.','CLA SST 180.')";
//	$cla5_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA AFR 190.','CLA AFR 210.','CLA ANT 101.','CLA COM 230.','CLA ECN 150.','CLA ECN 151.','CLA GEO 111.','CLA GHS 200.','CLA JMS 101.','CLA JMS 145.','CLA JMS 240.','CLA PHI 237.','CLA POL 101.','CLA POL 253.','CLA IAF 253.','CLA PSY 101.','CLA SOC 101.','CLA SOC 210.','CLA WGS 180.')";
//	$cla6_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA BIO 102.','CLA BIO 110.','CLA CHM 110.','CLA CHM 111.','CLA ENB 150.','CLA PHY 102.','CLA PHY 108.','CLA PHY 109.','CLA PHY 115.','CLA PHY 141.','CLA PHY 161.')";
//	$cla7_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 204.','CLA MAT 104.','CLA MAT 141.','CLA MAT 191.','CLA PHI 180.','CLA STA 126.')";

// courses for ISTBS  
	$istbs_req = "SELECT *  FROM Courses WHERE CourseID IN ('CLA CSC 204.','CLA IST 126.','CLA IST 220.','CLA IST 221.','CLA IST 222.','CLA IST 276.','CLA IST 351.','CLA CYS 223.','CLA IST 470.','EGR TCO 341.','EGR TCO 141.')";
	$istbs_result = mysqli_query($con, $istbs_req);

//	$istbsc1_req = "SELECT * FROM Courses WHERE CourseID IN('CLA IST 311.','CLA IST 321.','CLA IST 349.','CLA IST 417.','CLA IST 471.','CLA IST 472.','CLA IST 485.')";
//	$istbsc1_result = mysqli_query($con, $istbsc1_req);
//	$istbsc2_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA IST 301.')";
//	$istbsc2_result = mysqli_query($con, $istbsc2_req);

// courses for STA minor
	
// major and minor
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
	<div class='container'>
		<h3 style="text-align: center;">School: <?= $school ?></h3>
		<h3 style="text-align: center;">Major: <?= $name ?> | Minor: <?= $name2 ?></h3>
	</div>

<!-- JS for drag and drops -->
	<div class='container'>
		<script>
			function allowDrop(ev) {
  				ev.preventDefault();
			}

			function drag(ev) {
  				ev.dataTransfer.setData("text", ev.target.id);
			}

			function drop(ev) {
  				ev.preventDefault();
				var data = ev.dataTransfer.getData("text");
//just making sure we can grab credit hours
				var credit = (document.getElementById(data).getAttribute("data-value"));
				alert (credit);
				ev.target.appendChild(document.getElementById(data));
			}
		</script>

<!-- divided page into course bank, plan, and summer/transfer sections -->
		<div style="display: table; width: 100%;">
		<div style="display: table-row; width: 100%;">
			<div style="display: table-cell; width: 20%; padding-right: 30px;">
				<h4> Necessary Courses</h4>

				<div id="sourcebox" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: 1px solid black; padding: 10px;">
<?php		
//prints all results from query, adds prerequisite warning on hover

	while ($row = $istbs_result->fetch_assoc()){
		echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']. ' (' .$row['Credits']. ')'; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hasPR">PR: ' .$row['Prerequisites']; 

			 } 
			 else{ 
				 echo '<span class="noPR">no prerequisites';
			 } 
		echo' </span></div>';
	}
?>
				</div>
				<h4> <br> "choose X from" lists here</h4>
			</div>	

<!-- table for with each semester's drop box -->
			<div style="display: table-cell; width: 60%;">
			<div style="display: table; width: 100%;">
				<div class="droprow">
					<div class="boxtitle"><h4>Y1 Fall</h4></div><div class="boxtitle"><h4>Y1 Spring</h4></div>
				</div>
				<div class="droprow">
					<div class="dropbox" id="box1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
					<div class="dropbox" id="box2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>	
				</div>
				<div class="droprow">
					<div class="boxtitle"><h4>Y2 Fall</h4></div><div class="boxtitle"><h4>Y2 Spring</h4></div>
				</div>
				<div class="droprow">
					<div class="dropbox" id="box3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
					<div class="dropbox" id="box4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>	
				</div>
				<div class="droprow">
					<div class="boxtitle"><h4>Y3 Fall</h4></div><div class="boxtitle"><h4>Y3 Spring</h4></div>
				</div>
				<div class="droprow">
					<div class="dropbox" id="box5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
					<div class="dropbox" id="box6" ondrop="drop(event)" ondragover="allowDrop(event)"></div>	
				</div>		
				<div class="droprow">
					<div class="boxtitle"><h4>Y4 Fall</h4></div><div class="boxtitle"><h4>Y4 Spring</h4></div>
				</div>
				<div class="droprow">
					<div class="dropbox" id="box7" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
					<div class="dropbox" id="box8" ondrop="drop(event)" ondragover="allowDrop(event)"></div>	
				</div>
			</div>
			</div>

<!-- drop boxes for summer and transfer courses -->
			<div style="display: table-cell; width: 20%; padding-left: 30px;">
				<h4> To take over summer: </h4>
				<div id="summerbox" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: 1px solid black; padding: 10px;"></div>
				<h4> <br> Transfer credit(s): </h4>
				<div id="transferbox" ondrop="drop(event)" ondragover="allowDrop(event)" style="border: 1px solid black; padding: 10px;"></div>
			</div>
		</div>
		</div>
	</div>
	</body>
</html>
