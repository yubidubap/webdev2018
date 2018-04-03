<?php
	include "connection.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Schedule</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-select/css/bootstrap-select.css">
		<link rel="stylesheet" type="text/css" href="adminAddSchedule.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap-select/js/bootstrap-select.js"></script>
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
			<h1>Add Schedule</h1>
		</div>
		<form action="#" method="post">
			<div class="row">
				<div class="col-sm-4">
					<h3>Course:</h3>
						<div class="form-group">
	  						<select class="form-control" name="Course" id="course" onchange="showCurriculumAndSection(this.value)">
	  							<option>Select Course</option>
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
						<h2></h2>
				</div>

				<div class="col-sm-4">
					<h3>Curriculum:</h3>
						<div class="form-group">
	  						<select class="form-control" name="Curriculum" id="curriculum" onchange="showOptions(this.value, showSubject, 'getSubject.php')">
	  							  	<option>Select Curriculum</option>
	 						</select>
						</div>
						<h2></h2>
				</div>

				<div class="col-sm-4">
					<h3>Semester:</h3>
						<div class="form-group">
	  						<select class="form-control" name="Semester" id="semester">
	  								<option>Select Semester</option>
	    							<option>1</option>
	    							<option>2</option>
	 						</select>
						</div>
						<h2></h2>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<h3>Subject:</h3>
						<!--<select class="selectpicker" data-live-search="true" id="subjects" >
						</select>-->

						<div class="form-group">
	  						<select class="form-control" name="Subject" id="subjects">
	  							<option>Select Subject</option>
	 						</select>
						</div>
						<h2></h2>
				</div>

				<div class="col-sm-4">
					<h3>Section:</h3>
					<div class="form-group">
	  					<select class="form-control" name="Section" id="section">
	  						<option>Select Section</option>
	 					</select>
					</div>
				</div>

				<div class="col-sm-4">
					<h3>School Year:</h3>
					<div class="form-group">
	  					<select class="form-control" name="SchoolYear" id="schoolYear">
	  					<option>Select School Year</option>
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
			</div>

			<div class="row">

				<div class="col-sm-4">
					<h3>Slots:</h3>
						<div class="form-group">
	  						<input type="text" class="form-control" name="Slot" id="slot">
						</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
					<h3>Add:</h3>
						<button type="button" class="btn btn-info btn-block" data-toggle="collapse" data-target="#lecturebtn">Lecture Room</button>

							<div id="lecturebtn" class="collapse">
								<div class="form-group">
								
									<label for="timestartlec">Time Start:</label>
	  								<select class="form-control" name="TimeStartLec" id="timestartlec">
	  									<option>Select Start Time</option>
	    								<option>7:30 AM</option>
	    								<option>8:30 AM</option>
	    								<option>9:30 AM</option>
	    								<option>10:30 AM</option>
	    								<option>11:30 AM</option>
	    								<option>12:30 PM</option>
	    								<option>1:30 PM</option>
	    								<option>2:30 PM</option>
	    								<option>3:30 PM</option>
	    								<option>4:30 PM</option>
	    								<option>5:30 PM</option>
	    								<option>6:30 PM</option>
	 								</select>
								</div>

								<div class="form-group">
									<label for="timeendlec">Time End:</label>
	  								<select class="form-control" name="TimeEndLec" id="timeendlec">
	  									<option>Select End Time</option>
	    								<option>8:30 AM</option>
	    								<option>9:30 AM</option>
	    								<option>10:30 AM</option>
	    								<option>11:30 AM</option>
	    								<option>12:30 PM</option>
	    								<option>1:30 PM</option>
	    								<option>2:30 PM</option>
	    								<option>3:30 PM</option>
	    								<option>4:30 PM</option>
	    								<option>5:30 PM</option>
	    								<option>6:30 PM</option>
	    								<option>7:30 PM</option>
	 								</select>

								</div>

								<div class="form-group">
	  								<label for="room">Room:</label>
	  								<select class="form-control" name="RoomLec" id="roomLec">
	  									<option>Select Room</option>
		  								<?php
											$sql = "SELECT roomCode FROM room WHERE roomType = 'Lecture'";
											$result = $conn->query($sql);
											
											if ($result->num_rows > 0) 
											{
										   		while($row = $result->fetch_assoc())
										   		{
										        	echo "<option value='".$row["roomCode"]."'>".$row["roomCode"]."</option>";
										    	}
										    }
										?>	
	 								</select>
								</div>

								<div class="form-group">
									<div class="container">
										<h4>Day:</h4>
											<div class="checkbox">
												<label><input type="checkbox" name="checklist[]" value="MO">Monday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist[]" value="TU">Tuesday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist[]" value="WE">Wednesday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist[]" value="TH">Thursday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist[]" value="FR">Friday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist[]" value="SA">Saturday</label>
											</div>
									</div>
								</div>

								<div>
									<button type="button" class="btn btn-success">Save</button>
								</div>
							</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
					<h3>Add:</h3>
						<button type="button" class="btn btn-info btn-block" data-toggle="collapse" data-target="#laboratorybtn">Laboratory Room</button>

							<div id="laboratorybtn" class="collapse">
								<div class="form-group">
								<h2></h2>
									<label for="timestartlab">Time Start:</label>
	  								<select class="form-control" name="TimeStartLab" id="timestartlab">
	  									<option>Select Start Time</option>
	    								<option>7:30 AM</option>
	    								<option>8:30 AM</option>
	    								<option>9:30 AM</option>
	    								<option>10:30 AM</option>
	    								<option>11:30 AM</option>
	    								<option>12:30 PM</option>
	    								<option>1:30 PM</option>
	    								<option>2:30 PM</option>
	    								<option>3:30 PM</option>
	    								<option>4:30 PM</option>
	    								<option>5:30 PM</option>
	    								<option>6:30 PM</option>
	 								</select>
								</div>

								<div class="form-group">
									<label for="timeendlab">Time End:</label>
	  								<select class="form-control" name="TimeEndLab" id="timeendlab">
	  									<option>Select End Time</option>
	    								<option>8:30 AM</option>
	    								<option>9:30 AM</option>
	    								<option>10:30 AM</option>
	    								<option>11:30 AM</option>
	    								<option>12:30 PM</option>
	    								<option>1:30 PM</option>
	    								<option>2:30 PM</option>
	    								<option>3:30 PM</option>
	    								<option>4:30 PM</option>
	    								<option>5:30 PM</option>
	    								<option>6:30 PM</option>
	    								<option>7:30 PM</option>
	 								</select>

								</div>

								<div class="form-group">
	  								<label for="room">Room:</label>
	  								<select class="form-control" name="RoomLab" id="roomLab">
	  									<option>Select Room</option>
		  								<?php
											$sql = "SELECT roomCode FROM room WHERE roomType = 'Laboratory'";
											$result = $conn->query($sql);
											
											if ($result->num_rows > 0) 
											{
										   		while($row = $result->fetch_assoc())
										   		{
										        	echo "<option value='".$row["roomCode"]."'>".$row["roomCode"]."</option>";
										    	}
										    }
										?>	
	 								</select>
								</div>

								<div class="form-group">
									<div class="container">
										<h4>Day:</h4>
											<div class="checkbox">
												<label><input type="checkbox" name="checklist1[]" value="MO">Monday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist1[]" value="TU">Tuesday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist1[]" value="WE">Wednesday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist1[]" value="TH">Thursday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist1[]" value="FR">Friday</label>
											</div>
											<div class="checkbox">
	  											<label><input type="checkbox" name="checklist1[]" value="SA">Saturday</label>
											</div>
									</div>
								</div>

								<div>
									<button type="button" class="btn btn-success">Save</button>
								</div>

							</div>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
			<div class="pull-right">
				<h1></h1>
	 			<input type="submit" name="submit" class="btn btn-success"/>
	   			<button type="button" class="btn btn-default">Clear All</button>
			</div>
			</div>
		</form>

		<?php
			if(isset($_POST['submit']))
			{
				$course = $_POST['Course'];
				$curriculum = $_POST['Curriculum'];
				$sem = $_POST['Semester'];
				$sub = $_POST['Subject'];
				$sec = $_POST['Section'];
				$roomLec = $_POST['RoomLec'];
				$timeSLec = $_POST['TimeStartLec'];
				$timeELec = $_POST['TimeEndLec'];
				$roomLab = $_POST['RoomLab'];
				$timeSLab = $_POST['TimeStartLab'];
				$timeELab = $_POST['TimeEndLab'];
				$schYear = $_POST['SchoolYear'];
				$slot = $_POST['Slot'];

				echo "</br>Course: ".$course;
				echo "</br>Curriculum: ".$curriculum;
				echo "</br>School Year:".$schYear;
				echo "</br>Semester:".$sem;
				echo "</br>Subject: ".$sub;
				echo "</br>Slots: ".$slot;
				echo "</br>Section: ".$sec;
				echo "</br>Lecture Room: ".$roomLec;
				echo "</br>Start Time Lecture: ".$timeSLec;
				echo "</br>End Time Lecture: ".$timeELec;

				if(!empty($_POST['checklist'])) 
				{
					foreach($_POST['checklist'] as $selectedLec) 
					{
						echo "</br>".$selectedLec;
					}
				}

				echo "</br>Laboratory Room: ".$roomLab;
				echo "</br>Start Time Laboratory: ".$timeSLab;
				echo "</br>End Time Laboratory: ".$timeELab;

				if(!empty($_POST['checklist1'])) 
				{
					foreach($_POST['checklist1'] as $selectedLab) 
					{
						echo "</br>".$selectedLab;
					}
				}
			}
		?>

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

		function showCurriculum(xmlhttp)
		{
			document.getElementById("curriculum").innerHTML = xmlhttp.responseText;
		}

		function showSubject(xmlhttp)
		{
			document.getElementById("subjects").innerHTML = xmlhttp.responseText;
		}

		function showSection(xmlhttp)
		{
			document.getElementById("section").innerHTML = xmlhttp.responseText;
		}

		function showCurriculumAndSection(val)
		{
			showOptions(val, showCurriculum, 'getCurriculum.php');
			showOptions(val, showSection, 'getSection.php');
			showOptions(val, showSubject, 'getSubject.php');
		}
	</script>
</html>