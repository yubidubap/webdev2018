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
				<li><a href="adminAddSchedulePage.php">Section Offering</a></li>
				<li>View Schedule</li>

				<li><a href="logout.php">SIGN OUT</a></li>
			</ul>

			<img src="Quadrant1\logo.png">
		</div>

		<div class="header2">
			<h1>View Schedule</h1>
		</div>

		<form id="viewSchedForm">
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
	  							<select class="form-control" name="SchoolYear" id="schoolYear">
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
	  							<select class="form-control" name="Semester" id="semester">
	  								<option disabled selected>Select Semester</option>
	  								<option value = "1">1st</option>
	  								<option value = "2">2nd</option>
	  								<option value = "3">Summer</option>
	 							</select>
						</div>
				</div>
			</div>
		</form>

		<div class="row">
			<div>
				<table class="table" id="scheduleTable" >
					<tr style='background-color: #2D486A;'>
						<th style="color: #fbf7de;">Subject Code</th>
						<th style="color: #fbf7de;">Description</th>
						<th style="color: #fbf7de;">Units</th>
						<th style="color: #fbf7de;">Room Type</th>
						<th style="color: #fbf7de;">Day/s</th>
						<th style="color: #fbf7de;">Time Start</th>
						<th style="color: #fbf7de;">Time End</th>
						<th style="color: #fbf7de;">Room</th>
					</tr>
				</table>				
			</div>
		</div>

		<ul id="list"></ul>
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

		$(document).ready(function(){
			$("#section, #schoolYear, #semester").change(function() {
			    var sec = $("#section").val();
			    var sy = $("#schoolYear").val();
			    var sem = $("#semester").val();

        		$.ajax(
        		{
    				type: "GET",
    				url:  "getSchedule.php",
    				data: { sec: sec,
			        		sem: sem,
							sy: sy},

    				success: function(data)
    				{
        				$("#scheduleTable").html(data);
    				}
  				});
				
			});
		});

	</script>
</html>