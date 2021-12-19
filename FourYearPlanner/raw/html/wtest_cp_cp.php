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
		<style>
			.boxtitle{
				width: 200px;	
				display: table-cell;
				padding: 10px;
				text-align: center;
			}
			.dropbox {
			
				display: table-cell;
				height: 100px;
				border: 1px solid black;
			}
			.droprow {
				display: table-row;
				width: 100%;
			}
			.dragitem {
				position: relative;
				text-align: center;
				margin: 5px;
			}
			.hide {
				visibility: hidden;
				background-color: grey;
				color: white;
				text-align: center;
				top: -5px;
				left: 50%;
				width: 300px;
				position: absolute;
				padding: 5px;
				z-index: 1;
			}
			.dragitem:hover .hide{
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
	$cla0_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA UNV 101.','CLA INT 101.','CLA INT 201.','CLA INT 301.')";
	$cla0_result = mysqli_query($con, $cla0_req);
	$cla1_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA SPN 111.','CLA SPN 112.','CLA FRE 111.','CLA FRE 112.','CLA GER 111.','CLA GER 112.','CLA CHN 111.','CLA CHN 112.','CLA LAT 111.','CLA LAT 112.','CLA GRK 111.','CLA GRK 112.')";
	$cla1_result = mysqli_query($con, $cla1_req);
	$cla2_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA AFR 230.','CLA ENG 225.','CLA HIS 275.','CLA PHI 240.','CLA REL 110.','CLA REL 130.','CLA REL 150.','CLA REL 170.')";
	$cla2_result = mysqli_query($con, $cla2_req);
	$cla3_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA AFR 221.','CLA ART 106.','CLA ART 107.','CLA ART 108.','CLA ART 114.','CLA ART 115.','CLA ART 116.','CLA ART 117.','CLA ART 222.','CLA ART 229.','CLA ENG 221.','CLA ENG 222.','CLA ENG 226.','CLA ENG 233.','CLA ENG 234.','CLA ENG 235.','CLA ENG 237.','CLA HIS 245.','CLA JMS 220.','CLA JMS 225.','CLA JMS 230.','MUS MUS 151.')";
	$cla3_result = mysqli_query($con, $cla3_req);
	$cla4_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA AFR 225.','CLA CLA 101.','CLA CLA 102.','CLA ENG 224.','CLA ENG 263.','CLA ENG 264.','CLA ENG 265.','CLA FLL 195.','CLA HIS 105.','CLA HIS 176.','CLA HIS 201.','CLA HIS 215.','CLA HIS 225.','CLA PHI 176.','CLA PHI 190.','CLA PHI 195.','CLA PHI 230.','CLA PHI 269.','CAL POL 176.','CLA REL 210.','CLA REL 230.','CLA REL 270.','CLA SST 180.')";
	$cla4_result = mysqli_query($con, $cla4_req);
	$cla5_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA AFR 190.','CLA AFR 210.','CLA ANT 101.','CLA COM 230.','CLA ECN 150.','CLA ECN 151.','CLA GEO 111.','CLA GHS 200.','CLA JMS 101.','CLA JMS 145.','CLA JMS 240.','CLA PHI 237.','CLA POL 101.','CLA POL 253.','CLA IAF 253.','CLA PSY 101.','CLA SOC 101.','CLA SOC 210.','CLA WGS 180.')";
	$cla5_result = mysqli_query($con, $cla5_req);
	$cla6_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA BIO 102.','CLA BIO 110.','CLA CHM 110.','CLA CHM 111.','CLA ENB 150.','CLA PHY 102.','CLA PHY 108.','CLA PHY 109.','CLA PHY 115.','CLA PHY 141.','CLA PHY 161.')";
	$cla6_result = mysqli_query($con, $cla6_req);
	$cla7_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 204.','CLA MAT 104.','CLA MAT 141.','CLA MAT 191.','CLA PHI 180.','CLA STA 126.')";
	$cla7_result = mysqli_query($con, $cla7_req);

// courses for CSCS
	$cscs_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 204.','CLA CSC 205.','CLA CSC 245.','CLA CSC 322.','CLA CSC 323.','CLA CSC 330.','CLA CSC 340.','CLA CSC 460.','CLA CSC 480.','CLA MAT 191.','CLA MAT 192.','CLA MAT 225.','CLA MAT 320.')";
	$cscs1_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 310.','CLA CSC 312.','CLA CSC 315.','CLA CSC 324.','CLA CSC 335.','CLA CSC 360.','CLA CSC 380.','CLA CSC 408.','CLA CSC 415.','CLA CSC 435.','CLA CSC 450.','CLA CSC 485.')";
	$cscs2_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA MAT 131.','CLA MAT 133.')";
	$cscs3_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA BIO 211.','CLA BIO 212.','CLA CHM 111.','CLA CHM 112.','CLA PHY 161.','CLA PHY 162.')";

// courses for CSCA
	$csca_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 204.','CLA CSC 205.','CLA CSC 245.','CLA MAT 191.','CLA MAT 192.','CLA MAT 225.')";
	$csca1_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 322.','CLA CSC 323.')";
	$csca2_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA MAT 131.','CLA MAT 133.')";
	$csca3_req = "SELECT * FROM Courses WHERE CourseID LIKE ('CLA CSC 3%') AND CourseID NOT IN ('CLA CSC 303.','CLA CSC 308.') OR CourseID LIKE ('CLA CSC 4%')";

// courses for ISTS  
	$ists_req = "SELECT *  FROM Courses WHERE CourseID IN ('CLA CSC 204.','CLA IST 126.','CLA IST 220.','CLA IST 221.','CLA IST 222.','CLA IST 276.','CLA IST 351.','CLA CYS 223.','CLA IST 470.','EGR TCO 341.','EGR TCO 141.')";
	$ists1_req = "SELECT * FROM Courses WHERE CourseID IN('CLA IST 311.','CLA IST 321.','CLA IST 349.','CLA IST 417.','CLA IST 471.','CLA IST 472.','CLA IST 485.')";
	$ists2_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA IST 301.')";
	$ists3_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA STA 126.','CLA MAT 320.')";

// courses for STA minor
	$sta_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA STA 126.','CLA STA 227.','CLA STA 330.','CLA STA 340.')";
	$sta_result = mysqli_query($con, $sta_req);

	$sta1_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA BIO 421.','BUS ECN 353.','CLA GHS 330.','CLA MAT 320.','BUS MKT 415.','CLA POL 295.','CLA SOC 304.','CLA PSY 306.')";
	$sta1_result = mysqli_query($con, $sta1_req);

// courses for ISTA
	$ista_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 204.','CLA IST 126.','CLA IST 220.','CLA IST 221.','CLA IST 222.','CLA IST 276.')";
	$ista1_req = "SELECT * FROM Courses WHERE CourseID IN ('EGR TCO 341.','CLA CYS 223.','CLA IST 311.','CLA IST 321.','CLA IST 349.','CLA IST 351.','CLA IST 417.','CLA IST 470.','CLA IST 471.','CLA IST 472.')";
	$ista2_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA IST 301.')";

// courses for IST minor
	//$ist_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA IST 126.')";
	$ist1_req = "SELECT * FROM Courses WHERE CourseID = ('CLA IST 301.')";
	$ist1_result = mysqli_query($con, $ist1_req);

	$istcy_req = "SELECT * FROM Courses WHERE CourseID LIKE ('CLA IST 3%') AND CourseID NOT LIKE ('CLA IST 301.') OR CourseID LIKE ('CLA IST 4%')";
	$istcy_result = mysqli_query($con, $istcy_req);

	//$ist2_req = "SELECT * FROM Courses WHERE CourseID LIKE ('CLA IST 2%') OR CourseID LIKE ('CLA IST 3$') AND CourseID NOT LIKE ('CLA IST 301.') OR CourseID LIKE ('CLA IST 4%')";

// courses for CYSS	
	$cyss_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 204.','CLA IST 126.','CLA IST 222.','CLA IST 221.','CLA CYS 223.','CLA CYS 301.','CLA CYS 305.','CLA CYS 321.','CLA CYS 487.','CLA STA 126.','CLA MAT 191.','CLA MAT 225.')";
	$cyss1_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 205.','CLA CYS 245.','CLA CYS 324.','CLA CYS 374','CLA CYS 421.','CLA CYS 422.','CLA CYS 423.','CLA CYS 425.','CLA CYS 485.','CLA IST 311.','CLA IST 417.')";

// courses for CYSA
	$cysa_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 204.','CLA IST 126.','CLA IST 222.','CLA IST 221.','CLA CYS 223.','CLA CYS 301.','CLA CYS 305.','CLA CYS 487.','CLA STA 126.')";
	$cysa1_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA IST 311.','CLA CYS 321.','CLA CYS 324.','CLA CYS 374.','CLA CYS 421.','CLA CYS 422.','CLA CYS 423.','CLA CYS 425.','CLA CYS 485.','CLA CYS 488.','CLA IST 417.')";

// courses for CYS minor
	$cyists_req = "SELECT * FROM Courses WHERE CourseID = ('CLA CYS 305.')";
	$cyists_result = mysqli_query($con, $cyists_req);

	$cyista_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CYS 223.','CLA CYS 305.')";
	$cyista_result = mysqli_query($con, $cyista_req);

	$cys1_req = "SELECT * FROM Courses WHERE CourseID LIKE ('CLA CYS 3%') AND CourseID NOT LIKE ('CLA CYS 305.') AND CourseID NOT LIKE ('CLA CYS 301.') OR CourseID LIKE ('CLA CYS 4%') AND CourseID NOT LIKE ('CLA CYS 487.') AND CourseID NOT LIKE ('CLA CYS 488.')";
	$cys1_result = mysqli_query($con, $cys1_req);

// courses for csc minor
	$csc_req = "SELECT * FROM Courses WHERE CourseID = ('CLA CSC 205.')";
	$csc_result = mysqli_query($con, $csc_req);

	$csc1_req = "SELECT * FROM Courses WHERE CourseID = ('CLA CSC 245.') OR CourseID LIKE ('CLA CSC 3%') AND CourseID NOT LIKE ('CLA CSC 303.') AND CourseID NOT LIKE ('CLA CSC 308.')";
	$csc1_result = mysqli_query($con, $csc1_req);
	
// courses for dat-sci minor	
	$dat_req = "SELECT * FROM Courses WHERE CourseID IN ('CLA CSC 125.','CLA CSC 148.','CLA CSC 308.','CLA STA 126.','CLA STA 340.','CLA CSC 408.')";
	$dat_result = mysqli_query($con, $dat_req);

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
		<h5 style="text-align: center;"> ES: Every Semester | EF: Every Fall | EP: Every Spring | 1Y: Every Year | 2Y: Every Other Year/2 Years | OC: Occasionally</h5>
	</div>

<!-- JS for drag and drops -->
	<div class='container'>
		<script>
		//establish credit count variables and spans
			var tothours = 0;
			var b1 = 0;
			var b2 = 0;
			var b3 = 0;
			var b4 = 0; 
			var b5 = 0;
			var b6 = 0;
			var b7 = 0;
			var b8 = 0;
			var summer = 0;
			var transfer = 0;

			function allowDrop(ev) {
  				ev.preventDefault();
			}
			function drag(ev) {
				ev.dataTransfer.setData("text", ev.target.id);
			}
			function drop(ev, a) {
				ev.preventDefault();
				var data = ev.dataTransfer.getData("text");
			
			//get hours to add/subtract
				var credit = (document.getElementById(data).getAttribute("data-value"));
				
			//get the starting location
				var loc = (document.getElementById(data).getAttribute("data-location"));

			//if location started in box with credit counter, subtract on-move
				if (loc == "box1"){
					b1 -= Number(credit);
					var f1 = (document.getElementById("f1hrs"));
					f1.innerHTML = b1;
				}
				else if (loc == "box2"){
					b2 -= Number(credit);
					var s1 = (document.getElementById("s1hrs"));
					s1.innerHTML = b2;
				}
				else if (loc == "box3"){
					b3 -= Number(credit);
					var f2 = (document.getElementById("f2hrs"));
					f2.innerHTML = b3;
				}
				else if (loc == "box4"){
					b4 -= Number(credit);
					var s2 = (document.getElementById("s2hrs"));
					s2.innerHTML = b4;
				}
				else if (loc == "box5"){
					b5 -= Number(credit);
					var f3 = (document.getElementById("f3hrs"));
					f3.innerHTML = b5;
				}
				else if (loc == "box6"){
					b6 -= Number(credit);
					var s3 = (document.getElementById("s3hrs"));
					s3.innerHTML = b6;
				}
				else if (loc == "box7"){
					b7 -= Number(credit);
					var f4 = (document.getElementById("f4hrs"));
					f4.innerHTML = b7;
				}
				else if (loc == "box8"){
					b8 -= Number(credit);
					var s4 = (document.getElementById("s4hrs"));
					s4.innerHTML = b8;
				}
				else if (loc == "summer"){
					summer -= Number(credit);
					var sumr = (document.getElementById("shrs"));
					sumr.innerHTML = summer;
				}
				else if (loc == "transfer"){
					transfer -= Number(credit);
					var trns = (document.getElementById("thrs"));
					trns.innerHTML = transfer;
				}
				else{
				}
			//change "data-location" attribute accrding to where dropped, add to total if needed
				if (a == "box1"){
					document.getElementById(data).setAttribute("data-location", "box1");
					b1 += Number(credit);
					var f1 = (document.getElementById("f1hrs"));
					f1.innerHTML = b1;
				}
				else if (a == "box2"){
					document.getElementById(data).setAttribute("data-location", "box2");
					b2 += Number(credit);
					var s1 = (document.getElementById("s1hrs"));
					s1.innerHTML = b2;
				}
				else if (a == "box3"){
					document.getElementById(data).setAttribute("data-location", "box3");
					b3 += Number(credit);
					var f2 = (document.getElementById("f2hrs"));
					f2.innerHTML = b3;	
				}
				else if (a == "box4"){
					document.getElementById(data).setAttribute("data-location", "box4");
					b4 += Number(credit);
					var s2 = (document.getElementById("s2hrs"));
					s2.innerHTML = b4;
				}
				else if (a == "box5"){
					document.getElementById(data).setAttribute("data-location", "box5");
					b5 += Number(credit);
					var f3 = (document.getElementById("f3hrs"));
					f3.innerHTML = b5;
				}
				else if (a == "box6"){
					document.getElementById(data).setAttribute("data-location", "box6");
					b6 += Number(credit);
					var s3 = (document.getElementById("s3hrs"));
					s3.innerHTML = b6;
				}
				else if (a == "box7"){
					document.getElementById(data).setAttribute("data-location", "box7");
					b7 += Number(credit);
					var f4 = (document.getElementById("f4hrs"));
					f4.innerHTML = b7;
				}
				else if (a == "box8"){
					document.getElementById(data).setAttribute("data-location", "box8");
					b8 += Number(credit);
					var s4 = (document.getElementById("s4hrs"));
					s4.innerHTML = b8;
				}
 				else if (a == "1"){
					document.getElementById(data).setAttribute("data-location", "sourcebox1");
				}
 				else if (a == "2"){
					document.getElementById(data).setAttribute("data-location", "sourcebox2");
				}
	 			else if (a == "3"){
					document.getElementById(data).setAttribute("data-location", "sourcebox3");
				}
	 			else if (a == "4"){
					document.getElementById(data).setAttribute("data-location", "sourcebox4");
				}
	 			else if (a == "5"){
					document.getElementById(data).setAttribute("data-location", "sourcebox5");
				}
	 			else if (a == "6"){
					document.getElementById(data).setAttribute("data-location", "sourcebox6");
				}
	 			else if (a == "7"){
					document.getElementById(data).setAttribute("data-location", "sourcebox7");
				}
	 			else if (a == "8"){
					document.getElementById(data).setAttribute("data-location", "sourcebox8");
				}
				else if (a == "9"){
					document.getElementById(data).setAttribute("data-location", "sourcebox9");
				}
				else if (a == "summer"){
					document.getElementById(data).setAttribute("data-location", "summer");
					summer += Number(credit);
					var sumr = (document.getElementById("shrs"));
					sumr.innerHTML = summer;
				}
		 		else if (a == "transfer"){
					document.getElementById(data).setAttribute("data-location", "transfer");
					transfer += Number(credit);
					var trns = (document.getElementById("thrs"));
					trns.innerHTML = transfer;
				}
				ev.target.appendChild(document.getElementById(data));
			//updates total credit hours
				var crdcount = (document.getElementById("totalhours"));
				tothours = (b1 + b2 + b3 + b4 + b5 + b6 + b7 + b8 + summer + transfer);
				crdcount.innerHTML = tothours;	
			}
			
			function save() {
				window.location.href = "myplans.php";
			}
		</script>

<!-- divided page into course bank, plan, and summer/transfer sections -->
		<div style="display: table;">
		<div style="display: table-row; ">
			<div style="display: table-cell; padding-right: 30px;">
			<div style="display: table;">
				<div style="display: table-row;">
				<div style="display: table-cell;">
					<div id="sourcebox1" ondrop="drop(event,'1')" ondragover="allowDrop(event)" style="margin: 5px; width: 120px; border: 1px solid black;"><p style="text-align: center; background-color: black; color: white;">required:</p>
<?php		
// queries run based on major and then minor, adds prerequisite warning and other information on hover

///////////////////////////////////////////////////////////////
// IST BS
///////////////////////////////////////////////////////////////
if ($major == "ISTS"){
		$courses_result = mysqli_query($con, $ists_req);
		$ists1_result = mysqli_query($con, $ists1_req);
		$ists2_result = mysqli_query($con, $ists2_req);
		if ($minor == "STA"){
			while ($row = $sta_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		if ($minor =="CYS"){
			while ($row = $cyists_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		if ($minor == "DAT"){
			while ($row = $dat_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1" id="DATapplication" data-value="3"> App. Dat-Sci.<span class="hide"> Application of Data Science Req. <br> Any 300-400 disciplinary research course. </span></div>';
		}
		if ($minor =="CSC"){
			while ($row = $csc_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		while ($row = $courses_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}
		while ($row = $ists2_result->fetch_assoc()){
			for ($x = 0; $x <= 3; $x++){
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		while ($row = $cla0_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		} 
?>
					</div>
					<div id="sourcebox2" ondrop="drop(event,'2')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #293941;"><p style="text-align: center; background-color: #293941; color: white;"> two from:</p>
<?php
		while ($row = $ists1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #293941; color: white;"  data-location="sourcebox2" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
<?php 
	if ($minor == "STA"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> one and PR from:</p>
<?php
		while ($row = $sta1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
	if ($minor == "CYS"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> 3 hours from:</p>
<?php
		while ($row = $cys1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
	if ($minor == "CSC"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> 3 courses from:</p>
<?php
		while ($row = $csc1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
?>					
				</div>	
				<div style="display: table-cell;">
					<div id="sourcebox4" ondrop="drop(event,'4')" ondragover="allowDrop(event)" style="margin: 5px; width: 120px; border: 1px solid #7895A2;"><p style="text-align: center; background-color: #7895A2; color: white;"> pair from:</p>
<?php
		while ($row = $cla1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)"  style="background-color: #7895A2; color: white;" data-location="sourcebox4"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>	
					<div id="sourcebox5" ondrop="drop(event,'5')" ondragover="allowDrop(event)" style="width: 120px; border: 1px solid #AFC1CC; margin: 5px;"><p style="text-align: center; background-color: #AFC1CC;"> one from:</p>
<?php
		while ($row = $cla2_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #AFC1CC;"  data-location="sourcebox5" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}		
?>
					</div>
				</div>
				<div style="display: table-cell;">
					<div id="sourcebox6" ondrop="drop(event,'6')" ondragover="allowDrop(event)" style=" width: 120px; margin: 5px; border: 1px solid #D2CAA3;"><p style="text-align: center; background-color: #D2CAA3;"> one from:</p>
<?php
		while ($row = $cla3_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)"  style="background-color: #D2CAA3;" data-location="sourcebox6" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
				</div>	
				<div style="display: table-cell;">
					<div id="sourcebox7" ondrop="drop(event,'7')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #F4D27A;"><p style="text-align: center; background-color: #F4D27A;"> one from:</p>
<?php
		while ($row = $cla4_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #F4D27A;" data-location="sourcebox7" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
				</div>
				<div style="display: table-cell;">
					<div id="sourcebox8" ondrop="drop(event,'8')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #ee9e53;"><p style="text-align: center; background-color: #ee9e53; color: white;"> one from:</p>
<?php
		while ($row = $cla5_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #ee9e53; color: white;" data-location="sourcebox8" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}		
?>
					</div>	
					<div id="sourcebox9" ondrop="drop(event)" ondragover="allowDrop(event,'9')" style="width: 120px; border: 1px solid #eb803d; margin: 5px;"><p style="text-align: center; background-color: #eb803d; color: white;"> one from:</p>
<?php
		while ($row = $cla6_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #eb803d; color: white;" data-location="sourcebox9" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
	 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}			
?>
					</div>
				</div>
				</div>	
			</div>
<?php	
}
//////////////////////////////////////////////////////////////////
// IST BA
//////////////////////////////////////////////////////////////////
else if ($major == "ISTA"){
		$courses_result = mysqli_query($con, $ista_req);
		$ista1_result = mysqli_query($con, $ista1_req);
		$ista2_result = mysqli_query($con, $ista2_req);
		if ($minor == "STA"){
			while ($row = $sta_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		if ($minor =="CYS"){
			while ($row = $cyista_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		if ($minor == "DAT"){
			while ($row = $dat_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1" id="DATapplication" data-value="3"> App. Dat-Sci.<span class="hide"> Application of Data Science Req. <br> Any 300-400 disciplinary research course. </span></div>';
		}
		if ($minor =="CSC"){
			while ($row = $csc_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		while ($row = $courses_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}
		while ($row = $ista2_result->fetch_assoc()){
			for ($x = 0; $x <= 3; $x++){
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		while ($row = $cla0_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		} 
?>
					</div>
					<div id="sourcebox2" ondrop="drop(event,'2')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #293941;"><p style="text-align: center; background-color: #293941; color: white;"> four from:</p>
<?php
		while ($row = $ista1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #293941; color: white;"  data-location="sourcebox2" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
<?php 
	if ($minor == "STA"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> one and PR from:</p>
<?php
		while ($row = $sta1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
	if ($minor == "CYS"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> 3 hours from:</p>
<?php
		while ($row = $cys1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
	if ($minor == "CSC"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> 3 courses from:</p>
<?php
		while ($row = $csc1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
?>					
				</div>	
				<div style="display: table-cell;">
					<div id="sourcebox4" ondrop="drop(event,'4')" ondragover="allowDrop(event)" style="margin: 5px; width: 120px; border: 1px solid #7895A2;"><p style="text-align: center; background-color: #7895A2; color: white;"> pair from:</p>
<?php
		while ($row = $cla1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)"  style="background-color: #7895A2; color: white;" data-location="sourcebox4"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>	
					<div id="sourcebox5" ondrop="drop(event,'5')" ondragover="allowDrop(event)" style="width: 120px; border: 1px solid #AFC1CC; margin: 5px;"><p style="text-align: center; background-color: #AFC1CC;"> one from:</p>
<?php
		while ($row = $cla2_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #AFC1CC;"  data-location="sourcebox5" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}		
?>
					</div>
				</div>
				<div style="display: table-cell;">
					<div id="sourcebox6" ondrop="drop(event,'6')" ondragover="allowDrop(event)" style=" width: 120px; margin: 5px; border: 1px solid #D2CAA3;"><p style="text-align: center; background-color: #D2CAA3;"> one from:</p>
<?php
		while ($row = $cla3_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)"  style="background-color: #D2CAA3;" data-location="sourcebox6" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
				</div>	
				<div style="display: table-cell;">
					<div id="sourcebox7" ondrop="drop(event,'7')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #F4D27A;"><p style="text-align: center; background-color: #F4D27A;"> one from:</p>
<?php
		while ($row = $cla4_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #F4D27A;" data-location="sourcebox7" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
				</div>
				<div style="display: table-cell;">
					<div id="sourcebox8" ondrop="drop(event,'8')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #ee9e53;"><p style="text-align: center; background-color: #ee9e53; color: white;"> one from:</p>
<?php
		while ($row = $cla5_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #ee9e53; color: white;" data-location="sourcebox8" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}		
?>
					</div>	
					<div id="sourcebox9" ondrop="drop(event)" ondragover="allowDrop(event,'9')" style="width: 120px; border: 1px solid #eb803d; margin: 5px;"><p style="text-align: center; background-color: #eb803d; color: white;"> one from:</p>
<?php
		while ($row = $cla6_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #eb803d; color: white;" data-location="sourcebox9" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
	 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}			
?>
					</div>
				</div>
				</div>	
			</div>
<?php
}
////////////////////////////////////////////////////////
// CYS BS
////////////////////////////////////////////////////////
else if ($major == "CYSS"){
		$courses_result = mysqli_query($con, $cyss_req);
		$cyss1_result = mysqli_query($con, $cyss1_req);
		if ($minor == "STA"){
			while ($row = $sta_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		if ($minor =="IST"){
			while ($row = $ist1_result->fetch_assoc()){	
				for ($x = 0; $x <= 2; $x++){
					echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
					 if( is_null($row['Prerequisites']) != 1){ 
						 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
					 } 
					 else{ 
						 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
					 } 
					echo' </span></div>';
				}
			}
		}
		if ($minor == "DAT"){
			while ($row = $dat_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1" id="DATapplication" data-value="3"> App. Dat-Sci.<span class="hide"> Application of Data Science Req. <br> Any 300-400 disciplinary research course. </span></div>';
		}
		if ($minor =="CSC"){
			while ($row = $csc_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		while ($row = $courses_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}
		while ($row = $cla0_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		} 
?>
					</div>
					<div id="sourcebox2" ondrop="drop(event,'2')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #293941;"><p style="text-align: center; background-color: #293941; color: white;">21 hours from:</p>
<?php
		while ($row = $cyss1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #293941; color: white;"  data-location="sourcebox2" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
<?php 
	if ($minor == "STA"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> one and PR from:</p>
<?php
		while ($row = $sta1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
	if ($minor == "IST"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> 6 hours from:</p>
<?php
		while ($row = $istcy_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
	if ($minor == "CSC"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> 3 courses from:</p>
<?php
		while ($row = $csc1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
?>					
				</div>	
				<div style="display: table-cell;">
					<div id="sourcebox4" ondrop="drop(event,'4')" ondragover="allowDrop(event)" style="margin: 5px; width: 120px; border: 1px solid #7895A2;"><p style="text-align: center; background-color: #7895A2; color: white;"> pair from:</p>
<?php
		while ($row = $cla1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)"  style="background-color: #7895A2; color: white;" data-location="sourcebox4"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>	
					<div id="sourcebox5" ondrop="drop(event,'5')" ondragover="allowDrop(event)" style="width: 120px; border: 1px solid #AFC1CC; margin: 5px;"><p style="text-align: center; background-color: #AFC1CC;"> one from:</p>
<?php
		while ($row = $cla2_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #AFC1CC;"  data-location="sourcebox5" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}		
?>
					</div>
				</div>
				<div style="display: table-cell;">
					<div id="sourcebox6" ondrop="drop(event,'6')" ondragover="allowDrop(event)" style=" width: 120px; margin: 5px; border: 1px solid #D2CAA3;"><p style="text-align: center; background-color: #D2CAA3;"> one from:</p>
<?php
		while ($row = $cla3_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)"  style="background-color: #D2CAA3;" data-location="sourcebox6" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
				</div>	
				<div style="display: table-cell;">
					<div id="sourcebox7" ondrop="drop(event,'7')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #F4D27A;"><p style="text-align: center; background-color: #F4D27A;"> one from:</p>
<?php
		while ($row = $cla4_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #F4D27A;" data-location="sourcebox7" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
				</div>
				<div style="display: table-cell;">
					<div id="sourcebox8" ondrop="drop(event,'8')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #ee9e53;"><p style="text-align: center; background-color: #ee9e53; color: white;"> one from:</p>
<?php
		while ($row = $cla5_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #ee9e53; color: white;" data-location="sourcebox8" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}		
?>
					</div>	
					<div id="sourcebox9" ondrop="drop(event)" ondragover="allowDrop(event,'9')" style="width: 120px; border: 1px solid #eb803d; margin: 5px;"><p style="text-align: center; background-color: #eb803d; color: white;"> one from:</p>
<?php
		while ($row = $cla6_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #eb803d; color: white;" data-location="sourcebox9" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
	 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}			
?>
					</div>
				</div>
				</div>	
			</div>
<?php
}
//////////////////////////////////////////////////////////////////////////
// CYS BA
// ///////////////////////////////////////////////////////////////////////
else if ($major == "CYSA"){
		$courses_result = mysqli_query($con, $cysa_req);
		$cysa1_result = mysqli_query($con, $cysa1_req);
		if ($minor == "STA"){
			while ($row = $sta_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		if ($minor =="IST"){
			while ($row = $ist1_result->fetch_assoc()){	
				for ($x = 0; $x <= 2; $x++){
					echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
					 if( is_null($row['Prerequisites']) != 1){ 
						 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
					 } 
					 else{ 
						 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
					 } 
					echo' </span></div>';
				}
			}
		}
		if ($minor == "DAT"){
			while ($row = $dat_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1" id="DATapplication" data-value="3"> App. Dat-Sci.<span class="hide"> Application of Data Science Req. <br> Any 300-400 disciplinary research course. </span></div>';
		}
		if ($minor =="CSC"){
			while ($row = $csc_result->fetch_assoc()){	
				echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
				 if( is_null($row['Prerequisites']) != 1){ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
				 } 
				 else{ 
					 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
				 } 
				echo' </span></div>';
			}
		}
		while ($row = $courses_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}
		while ($row = $cla0_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: black; color: white;" data-location="sourcebox1"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		} 
?>
					</div>
					<div id="sourcebox2" ondrop="drop(event,'2')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #293941;"><p style="text-align: center; background-color: #293941; color: white;">15 hours from:</p>
<?php
		while ($row = $cysa1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #293941; color: white;"  data-location="sourcebox2" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
<?php 
	if ($minor == "STA"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> one and PR from:</p>
<?php
		while ($row = $sta1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
	if ($minor == "IST"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> 6 hours from:</p>
<?php
		while ($row = $istcy_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
	if ($minor == "CSC"){
?>
					<div id="sourcebox3" ondrop="drop(event,'3')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #517281;"><p style="text-align: center; background-color: #517281; color: white;"> 3 courses from:</p>
<?php
		while ($row = $csc1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #517281; color: white;"  data-location="sourcebox3" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
			echo' </span></div>';
		}	
					echo'</div>';
	}
?>					
				</div>	
				<div style="display: table-cell;">
					<div id="sourcebox4" ondrop="drop(event,'4')" ondragover="allowDrop(event)" style="margin: 5px; width: 120px; border: 1px solid #7895A2;"><p style="text-align: center; background-color: #7895A2; color: white;"> pair from:</p>
<?php
		while ($row = $cla1_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)"  style="background-color: #7895A2; color: white;" data-location="sourcebox4"  id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>	
					<div id="sourcebox5" ondrop="drop(event,'5')" ondragover="allowDrop(event)" style="width: 120px; border: 1px solid #AFC1CC; margin: 5px;"><p style="text-align: center; background-color: #AFC1CC;"> one from:</p>
<?php
		while ($row = $cla2_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #AFC1CC;"  data-location="sourcebox5" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}		
?>
					</div>
				</div>
				<div style="display: table-cell;">
					<div id="sourcebox6" ondrop="drop(event,'6')" ondragover="allowDrop(event)" style=" width: 120px; margin: 5px; border: 1px solid #D2CAA3;"><p style="text-align: center; background-color: #D2CAA3;"> one from:</p>
<?php
		while ($row = $cla3_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)"  style="background-color: #D2CAA3;" data-location="sourcebox6" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
				</div>	
				<div style="display: table-cell;">
					<div id="sourcebox7" ondrop="drop(event,'7')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #F4D27A;"><p style="text-align: center; background-color: #F4D27A;"> one from:</p>
<?php
		while ($row = $cla4_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #F4D27A;" data-location="sourcebox7" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}	
?>	
					</div>
				</div>
				<div style="display: table-cell;">
					<div id="sourcebox8" ondrop="drop(event,'8')" ondragover="allowDrop(event)" style="width: 120px; margin: 5px; border: 1px solid #ee9e53;"><p style="text-align: center; background-color: #ee9e53; color: white;"> one from:</p>
<?php
		while ($row = $cla5_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #ee9e53; color: white;" data-location="sourcebox8" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
			 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}		
?>
					</div>	
					<div id="sourcebox9" ondrop="drop(event)" ondragover="allowDrop(event,'9')" style="width: 120px; border: 1px solid #eb803d; margin: 5px;"><p style="text-align: center; background-color: #eb803d; color: white;"> one from:</p>
<?php
		while ($row = $cla6_result->fetch_assoc()){
			echo '<div class="dragitem" draggable="true" ondragstart="drag(event)" style="background-color: #eb803d; color: white;" data-location="sourcebox9" id="' .$row['CourseID']. '" data-value="' .$row['Credits']. '">' .$row['CourseID']; 
			 if( is_null($row['Prerequisites']) != 1){ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')<br><span style="background-color: red;">PR: '.$row['Prerequisites'].'</span>';
	 } 
			 else{ 
				 echo '<span class="hide">'.$row['Title'].' ('.$row['Credits'].')('.$row['Availability'].')';
			 } 
		echo' </span></div>';
		}			
?>
					</div>
				</div>
				</div>	
			</div>
<?php	
}

/*	else if ($major == "CSCS"){
		//$courses_result = mysqli_query($con, $cscs_req);
	}
	else if ($major == "CSCA"){
		//$courses_result = mysqli_query($con, $csca_req);
	}
 */
?>	
			</div>	

<!-- table for with each semester's drop box -->
			<div style="display: table-cell;">
			<div style="display: table; width: 100%;">
				<div class="droprow">
					<div class="boxtitle"><h4>Fall 1 (<span id="f1hrs">0</span>)</h4></div><div class="boxtitle"><h4> Spring 1 (<span id="s1hrs">0</span>)</h4></div>
				</div>
				<div class="droprow">
					<div class="dropbox" id="box1" ondrop="drop(event, 'box1')" ondragover="allowDrop(event)"></div>
					<div class="dropbox" id="box2" ondrop="drop(event, 'box2')" ondragover="allowDrop(event)"></div>	
				</div>
				<div class="droprow">
					<div class="boxtitle"><h4>Fall 2 (<span id="f2hrs">0</span>)</h4></div><div class="boxtitle"><h4>Spring 2 (<span id="s2hrs">0</span>)</h4></div>
				</div>
				<div class="droprow">
					<div class="dropbox" id="box3" ondrop="drop(event, 'box3')" ondragover="allowDrop(event)"></div>
					<div class="dropbox" id="box4" ondrop="drop(event, 'box4')" ondragover="allowDrop(event)"></div>	
				</div>
				<div class="droprow">
					<div class="boxtitle"><h4>Fall 3 (<span id="f3hrs">0</span>)</h4></div><div class="boxtitle"><h4>Spring 3 (<span id="s3hrs">0</span>)</h4></div>
				</div>
				<div class="droprow">
					<div class="dropbox" id="box5" ondrop="drop(event, 'box5')" ondragover="allowDrop(event)"></div>
					<div class="dropbox" id="box6" ondrop="drop(event, 'box6')" ondragover="allowDrop(event)"></div>	
				</div>		
				<div class="droprow">
					<div class="boxtitle"><h4>Fall 4 (<span id="f4hrs">0</span>)</h4></div><div class="boxtitle"><h4> Spring 4 (<span id="s4hrs">0</span>)</h4></div>
				</div>
				<div class="droprow">
					<div class="dropbox" id="box7" ondrop="drop(event, 'box7')" ondragover="allowDrop(event)"></div>
					<div class="dropbox" id="box8" ondrop="drop(event, 'box8')" ondragover="allowDrop(event)"></div>	
				</div>
			</div>
<!-- drop boxes for summer and transfer courses -->
				<h4> To take over summer (<span id="shrs">0</span>)</h4>
				<div id="summerbox" ondrop="drop(event, 'summer')" ondragover="allowDrop(event)" style="border: 1px solid black; padding: 10px;"></div>
				<h4> <br> Transfer credit(s) (<span id="thrs">0</span>)</h4>
				<div id="transferbox" ondrop="drop(event, 'transfer')" ondragover="allowDrop(event)" style="border: 1px solid black; padding: 10px;"></div>
				<h4> <br> Total Hours: <span id="totalhours"></span></h4>
				<button onclick="save()"> <h4> Save </h4> </button>
			</div>
		</div>
		</div>
	</div>
	</body>
</html>
