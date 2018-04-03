<?php
	include "connection.php";
?>

<!DOCTYPE html>
<html>

	<head>
		<title>View Schedule</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="adminViewSchedule.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>

	<body>

		<div class="header">

			<ul>
				<li><a href="adminProfilePage.php">Profile</a></li>
				<li><a href="adminAddAccountPage.php">Accounts</a></li>
				<li><a href="adminAddSchedulePage.php">Add Schedule</a></li>
				<li><a href="adminViewSchedulePage.php">View Schedule</a></li>

				<li>SIGN OUT</li>
			</ul>

			<img src="Quadrant1\logo.png">
		</div>

		<div class="header2">
			<h1>View Schedule</h1>
		</div>

		<div class="row">
			<div class="col-sm-6">
				<h3>Course:</h3>
					<div class="form-group">
  							<select class="form-control" name="Course" id="course" onchange="showOptions(this.value, showSection, 'getSection.php')">
  								<option disabled selected>Select Course</option>
								<?php
									$sql = "SELECT courseCode, courseTitle FROM Course";
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) 
									{
								   		while($row = $result->fetch_assoc())
								   		{
								        	echo "<option value='".$row["courseCode"]."'>".$row["courseTitle"]."</option>";
								    	}
								    }
								?>
 							</select>
					</div>
			</div>

			<div class="col-sm-6">
				<h3>Section:</h3>
					<div class="form-group">
  							<select class="form-control" name="Section" id="section">
  								<option disabled selected>Select Section</option>
 							</select>
					</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6">
				<h3>School Year:</h3>
					<div class="form-group">
  							<select class="form-control" name="Course" id="course">
  								<option disabled selected>Select School Year</option>
								<?php
									$sql = "SELECT DISTINCT schoolYear FROM enrollment";
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) 
									{
								   		while($row = $result->fetch_assoc())
								   		{
								        	echo "<option value='".$row["schoolYear"]."'>".$row["schoolYear"]."</option>";
								    	}
								    }
								?>
 							</select>
					</div>
			</div>

			<div class="col-sm-6">
				<h3>Semester:</h3>
					<div class="form-group">
  							<select class="form-control" name="Section" id="section">
  								<option disabled selected>Select Semester</option>
  								<option>1</option>
  								<option>2</option>
 							</select>
					</div>
			</div>
		</div>

		<div class="row">
			<div>
				<table class="table" id="scheduleTable">
					<tr>
						<th>Subject Code</th>
						<th>Description</th>
						<th>Units</th>
						<th>Room Type</th>
						<th>Day/s</th>
						<th>Time Start</th>
						<th>Time End</th>
						<th>Room</th>
					</tr>
				</table>				
			</div>
		</div>

	</body>

	<script type="text/javascript">
		function showOptions(str, currentFunction, url)
		{
	        if (window.XMLHttpRequest) 
	        {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } 

	        else 
	        {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }

	        xmlhttp.onreadystatechange = function()
	        {
	            if (this.readyState == 4 && this.status == 200) 
	            {
	            	currentFunction(this);
	          	}
	        };

	        xmlhttp.open("GET", url+ "?q=" +str, true);
	        xmlhttp.send();
		}


		function showSection(xmlhttp)
		{
			document.getElementById("section").innerHTML = xmlhttp.responseText;
		}

		function showSchedule(sem, sec, sy, cFunction, url)
		{
			if (window.XMLHttpRequest) 
	        {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } 

	        else 
	        {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }

	        xmlhttp.onreadystatechange = function()
	        {
	            if (this.readyState == 4 && this.status == 200) 
	            {
	            	currentFunction(this);
	          	}
	        };

	        xmlhttp.open("GET", url + "?sem=" + sem + "&sec=" + sec + "&sy=" + sy , true);
	        xmlhttp.send();
		}

		function showSchedule(str, currentFunction, url)
		{
			document.getElementById("scheduleTable").innerHTML = xmlhttp.responseText;
		}
	</script>

</html>