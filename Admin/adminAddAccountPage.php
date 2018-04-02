<!DOCTYPE html>
<html>

	<head>
		<title>Accounts</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="adminAddAccount.css">
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
			<h1>Add Account</h1>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="accounttype">Account Type:</label>
  					<select class="form-control" id="accounttype" onchange="enableCurriculumCourse()">
    					<option>Student</option>
    					<option>Administrator</option>
    					<option>Registrar</option>
    					
 					</select>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label for="course">Course:</label>
  					<select class="form-control" id="course">
    					<option>BS Information Technology</option>
    					<option>BS Accountancy</option>
    					<option>BS Electronics and Communications Engineer</option>
    					
 					</select>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label for="curriculum">Curriculum:</label>
  					<select class="form-control" id="curriculum">
    					<option>Curriculum 2009</option>
    					<option>Curriculum 2012</option>
    					<option>Curriculum 2015</option>
    					
 					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4">

				<div class="form-group">
					<label for="fname">First Name:</label>
					<input type="text" class="form-control" id="fname"></input>
				</div>
				
				<div class="form-group">
					<label for="Mname">Middle Name:</label>
					<input type="text" class="form-control" id="Mname"></input>
				</div>

				<div class="form-group">
					<label for="lname">Last Name:</label>
					<input type="text" class="form-control" id="lname"></input>
				</div>
			</div>
			<div class="col-sm-4">

				<div class="form-group">
					<label for="mobilenumber">Mobile Number:</label>
					<input type="text" class="form-control" id="mobNum"></input>
				</div>

				<div class="form-group">
					<label for="email">E-Mail Address:</label>
					<input type="text" class="form-control" id="email"></input>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="form-group">
					<label for="pass1">Password:</label>
					<input type="password" class="form-control" id="pass1"></input>
				</div>
				<div class="form-group">
					<label for="pass2">Confirm Password:</label>
					<input type="password" class="form-control" id="pass2"></input>
				</div>
			</div>

		</div>

		<div class="pull-right">
 			<button type="button" class="btn btn-success">Add Account</button>
  			<button type="button" class="btn btn-reset">Clear All</button>
		</div>

		<script type="text/javascript">

			function enableCurriculumCourse() {
				var x = document.getElementById("accounttype").value;

				if (x == "Student")
				{
					document.getElementById("course").disabled = false;
					document.getElementById("curriculum").disabled = false;
				}

				else
				{
					document.getElementById("course").setAttribute('disabled', true);
					document.getElementById("curriculum").setAttribute('disabled', true);
				}
			}
		</script>


	</body>

</html>