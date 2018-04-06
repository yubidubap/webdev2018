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
		<script src="adminAddSchedule.js"></script>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

	</head>

	<body>
		<div class="header">
			<ul>
				<li><a href="adminProfilePage.php">Profile</a></li>
				<li><a href="adminAddAccountPage.php">Accounts</a></li>
				<li>Section Offering</li>
				<li><a href="adminViewSchedulePage.php">View Schedule</a></li>

				<li>SIGN OUT</li>
			</ul>

			<img src="Quadrant1\logo.png">
		</div>

		<div class="header2">
			<h1>Section Offering</h1>
		</div>
		<form class="container-fluid" action="#" method="post" id="validateSchedule">
			<div class="row">
				<div class="col-sm-4">
					<h3>Course:</h3>
						<div class="form-group">
	  						<select class="form-control" name="Course" id="course" onchange="showCurriculumAndSection(this.value)">
	  							<option disabled selected hidden>Select Course</option>
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
	  							  	<option disabled selected hidden>Select Curriculum</option>
	 						</select>
						</div>
						<h2></h2>
				</div>

				<div class="col-sm-4">
					<h3>Semester:</h3>
						<div class="form-group">
	  						<select class="form-control" name="Semester" id="semester">
	  								<option disabled selected hidden>Select Semester</option>
	    							<option value = "1">1st</option>
  									<option value = "2">2nd</option>
  									<option value = "3">Summer</option>
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
	  							<option disabled selected hidden>Select Subject</option>

	 						</select>
						</div>
						<h2></h2>
				</div>

				<div class="col-sm-4">
					<h3>Section:</h3>
					<div class="form-group">
	  					<select class="form-control" name="Section" id="section">
	  						<option disabled selected hidden>Select Section</option>
	 					</select>
					</div>
				</div>

				<div class="col-sm-4">
					<h3>School Year:</h3>
					<div class="form-group">
	  					<select class="form-control" name="SchoolYear" id="schoolYear">
	  					<option disabled selected hidden>Select School Year</option>
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
	  						<input type="text" id="slot" name="Slot" placeholder="Specify the total number of slots" 
								class="form-control" type="text" onkeypress="return numbersOnly(this, event)" maxlength="2"></input>
						</div>
				</div>

				<div class="col-sm-4">
					<h3>Add:</h3>
						<button type="button" class="btn btn-info btn-block" id="lecButton" data-target="#lecturebtn">Lecture Room</button>
							<div id="lecturebtn" style="display: none;">
								<div class="form-group">
									<h2></h2>
									<label for="timestartlec">Time Start:</label>
	  								<select class="form-control" name="TimeStartLec" id="timestartlec">
	  									<option disabled selected hidden default>Select Start Time</option>
	    								<option value="7:30">7:30 AM</option>
	    								<option value="8:30">8:30 AM</option>
	    								<option value="9:30">9:30 AM</option>
	    								<option value="10:30">10:30 AM</option>
	    								<option value="11:30">11:30 AM</option>
	    								<option value="12:30">12:30 PM</option>
	    								<option value="13:30">1:30 PM</option>
	    								<option value="14:30">2:30 PM</option>
	    								<option value="15:30">3:30 PM</option>
	    								<option value="16:30">4:30 PM</option>
	    								<option value="17:30">5:30 PM</option>
	    								<option value="18:30">6:30 PM</option>
	 								</select>
								</div>

								<div class="form-group">
									<label for="timeendlec">Time End:</label>
	  								<select class="form-control" name="TimeEndLec" id="timeendlec">
	  									<option disabled selected hidden default>Select End Time</option>
	    								<option value="8:30">8:30 AM</option>
	    								<option value="9:30">9:30 AM</option>
	    								<option value="10:30">10:30 AM</option>
	    								<option value="11:30">11:30 AM</option>
	    								<option value="12:30">12:30 PM</option>
	    								<option value="13:30">1:30 PM</option>
	    								<option value="14:30">2:30 PM</option>
	    								<option value="15:30">3:30 PM</option>
	    								<option value="16:30">4:30 PM</option>
	    								<option value="17:30">5:30 PM</option>
	    								<option value="18:30">6:30 PM</option>
	    								<option value ="19:30">7:30 PM</option>
	 								</select>

								</div>

								<div class="form-group">
	  								<label for="room">Room:</label>
	  								<select class="form-control" name="RoomLec" id="roomLec">
	  									<option disabled selected hidden default>Select Lecture Room</option>
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
											<div class="checkbox" id="dayLec">
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
									<button type="button" id="save" class="btn btn-success">Save</button>
								</div>
							</div>
				</div>

				<div class="col-sm-4">

					<h3>Add:</h3>
						<button type="button" class="btn btn-info btn-block" id="labButton" data-target="#laboratorybtn">Laboratory Room</button>

							<div id="laboratorybtn" style="display: none;">
								<div class="form-group">
									<h2></h2>
									<label for="timestartlab">Time Start:</label>
	  								<select class="form-control" name="TimeStartLab" id="timestartlab">
	  									<option disabled selected hidden default>Select Start Time</option>
	    								<option value="7:30">7:30 AM</option>
	    								<option value="8:30">8:30 AM</option>
	    								<option value="9:30">9:30 AM</option>
	    								<option value="10:30">10:30 AM</option>
	    								<option value="11:30">11:30 AM</option>
	    								<option value="12:30">12:30 PM</option>
	    								<option value="13:30">1:30 PM</option>
	    								<option value="14:30">2:30 PM</option>
	    								<option value="15:30">3:30 PM</option>
	    								<option value="16:30">4:30 PM</option>
	    								<option value="17:30">5:30 PM</option>
	    								<option value="18:30">6:30 PM</option>
	 								</select>
								</div>

								<div class="form-group">
									<label for="timeendlab">Time End:</label>
	  								<select class="form-control" name="TimeEndLab" id="timeendlab">
	  									<option disabled selected hidden default>Select End Time</option>
	    								<option value="8:30">8:30 AM</option>
	    								<option value="9:30">9:30 AM</option>
	    								<option value="10:30">10:30 AM</option>
	    								<option value="11:30">11:30 AM</option>
	    								<option value="12:30">12:30 PM</option>
	    								<option value="13:30">1:30 PM</option>
	    								<option value="14:30">2:30 PM</option>
	    								<option value="15:30">3:30 PM</option>
	    								<option value="16:30">4:30 PM</option>
	    								<option value="17:30">5:30 PM</option>
	    								<option value="18:30">6:30 PM</option>
	    								<option value ="19:30">7:30 PM</option>
	 								</select>

								</div>

								<div class="form-group">
	  								<label for="room">Room:</label>
	  								<select class="form-control" name="RoomLab" id="roomLab">
	  									<option disabled selected hidden default>Select Laboratory Room</option>
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
									<button type="button" id="save2" class="btn btn-success">Save</button>
								</div>
							</div>
					</div>


			<div class="col-sm-12">
				<div class="pull-right">
					<h1></h1>
		 			<button class="btn btn-success" name="subButton" id="subButton"type="submit" data-target="#lecturebtn,#laboratorybtn">
		 			Submit Schedule</button>
		   			<button type="reset" class="btn btn-default" onclick="window.location.href='adminAddSchedulePage.php'">Clear All</button>
				</div>
			</div>
		</form>

		<?php
			if(isset($_POST['subButton']))
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

		$(document).ready(function(){

			$("#lecButton").click(function() {
				$("#timestartlec").val('Select Start Time');
				$("#timeendlec").val('Select End Time');
				$("#roomLec").val('Select Lecture Room');
				$('input:checkbox').removeAttr('checked');
				$("#lecturebtn").toggle("fast");
			});

			$("#labButton").click(function() {
				$("#timestartlab").val('Select Start Time');
				$("#timeendlab").val('Select End Time');
				$("#roomLab").val('Select Laboratory Room');
				$('input:checkbox').removeAttr('checked');
				$("#laboratorybtn").toggle("fast");
			});

			$("#save").click(function() {
				$("#lecButton").prop('disabled', true);
				$("#timestartlec").prop('disabled', true);
				$("#timeendlec").prop('disabled', true);
				$("#roomLec").prop('disabled', true);
				$('input:checkbox').prop('disabled', true);
			});


			$("#subButton").click(function() {
				var course = $("#course").val();
				var curriculum = $("#curriculum").val();
				var sem = $('#semester').val();
				var sub = $('#subjects').val();
				var sec = $('#section').val();
				var roomLec = $('#roomLec').val();
				var timeSLec = $('#timestartlec').val();
				var timeELec = $('#timeendlec').val();
				var roomLab = $('#roomLab').val();
				var timeSLab = $('#timestartlab').val();
				var timeELab = $('#timeendlab').val();
				var schYear = $('#schoolYear').val();
				var slot = $('#slot').val();

				console.log(course);
				console.log(curriculum);
				console.log(sem);
				console.log(sub);
				console.log(sec);
				console.log(roomLec);
				console.log(timeSLec);
				console.log(timeELec);
				console.log(roomLab);
				console.log(timeSLab);
				console.log(timeELab);
				console.log(schYear);
				console.log(slot);

				alert("Success Bitch");

			});

		});
	</script>
</html>