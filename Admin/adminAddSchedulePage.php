<?php
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "universidaddelaguna";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
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
				<li><a href="">Profile</a></li>
				<li><a href="">Accounts</a></li>
				<li><a href="">Add Schedule</a></li>
				<li><a href="">View Schedule</a></li>

				<li>SIGN OUT</li>
			</ul>

			<img src="Quadrant1\logo.png">
		</div>

		<div class="row">
			<div class="col-sm-4">
				<h3>Course:</h3>
					<div class="form-group">
  							<select class="form-control" id="course">
    							<?php
									$sql = "SELECT courseCode FROM Course";
									$result = $conn->query($sql);

							   		while($row = $result->fetch_assoc()) {
							        	echo "<option>".$row["courseCode"]."</option>";
							    	}
								?>
 							</select>
					</div>
					<h2></h2>
			</div>

			<div class="col-sm-4">
				<h3>Curriculum:</h3>
					<div class="form-group">
  							<select class="form-control" id="curriculum">
    							<?php
									$sql = "SELECT curriculumCode FROM curriculum";
									$result = $conn->query($sql);

							   		while($row = $result->fetch_assoc()) {
							        	echo "<option>".$row["curriculumCode"]."</option>";
							    	}
								?>
 							</select>
					</div>
					<h2></h2>
			</div>

			<div class="col-sm-4">
				<h3>Semester:</h3>
					<div class="form-group">
  							<select class="form-control" id="semester">
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
					<select class="selectpicker" data-live-search="true" id="subject">
					</select>
					<h2></h2>
			</div>

			<div class="col-sm-4">
				<h3>Section:</h3>
				<div class="form-group">
  					<select class="form-control" id="section">
			    		<?php
							$sql = "SELECT sectionCode FROM section";
							$result = $conn->query($sql);

					   		while($row = $result->fetch_assoc()) {
					        	echo "<option>".$row["sectionCode"]."</option>";
					    	}

						?>
 					</select>
				</div>	
			</div>
		</div>

		<div class="row">
					<div class="col-sm-6">
				<label for="lecturebtn"><h3>Lecture Room</h3></label>
				<div class="form-group">
					<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#lecturebtn">Add</button>

						<div id="lecturebtn" class="collapse">
							<div class="form-group">
								<label for="timestartlec">Time Start:</label>
  								<select class="form-control" id="timestartlec">
    								<option>7:30am</option>
    								<option>8:30am</option>
 								</select>
							</div>

							<div class="form-group">
								<label for="timeendlec">Time End:</label>
  								<select class="form-control" id="timeendlec">
    								<option>10:30am</option>
    								<option>11:30am</option>
 								</select>

							</div>

							<div class="form-group">
  								<label for="room">Room:</label>
  								<select class="form-control" id="room">
    								<option>SR 3-1</option>
    								<option>SR 3-2</option>    					
 								</select>
							</div>

							<div class="form-group">
								<div class="container">
									<h4>Day:</h4>
										<div class="checkbox">
											<label><input type="checkbox" value="MO">Monday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="TU">Tuesday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="WE">Wednesday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="TH">Thursday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="FR">Friday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="SA">Saturday</label>
										</div>
								</div>
							</div>

							<div>
								<button type="button" class="btn btn-success">Save</button>
							</div>
						</div>
				</div>
			</div>

			<div class="col-sm-6">
				<label for="laboratorybtn"><h3>Laboratory Room</h3></label>
				<div class="form-group">
					<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#laboratorybtn">Add</button>

						<div id="laboratorybtn" class="collapse">
							<div class="form-group">
								<label for="timestartlab">Time Start:</label>
  								<select class="form-control" id="timestartlab">
    								<option>7:30am</option>
    								<option>8:30am</option>
 								</select>
							</div>

							<div class="form-group">
								<label for="timeendlab">Time End:</label>
  								<select class="form-control" id="timeendlab">
    								<option>10:30am</option>
    								<option>11:30am</option>
 								</select>

							</div>

							<div class="form-group">
  								<label for="room">Room:</label>
  								<select class="form-control" id="room">
    								<option>SR 3-1</option>
    								<option>SR 3-2</option>    					
 								</select>
							</div>

							<div class="form-group">
								<div class="container">
									<h4>Day:</h4>
										<div class="checkbox">
											<label><input type="checkbox" value="MO">Monday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="TU">Tuesday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="WE">Wednesday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="TH">Thursday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="FR">Friday</label>
										</div>
										<div class="checkbox">
  											<label><input type="checkbox" value="SA">Saturday</label>
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

		<div>
		<h1></h1>
 			<button type="button" class="btn btn-success">Add Schedule</button>
  			<button type="button" class="btn btn-default">Clear All</button>
		</div>

	</body>

	<script type="text/javascript">

	</script>

</html>