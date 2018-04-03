<?php
	include "connection.php";
?>

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
		<!-- add -->
		<script src="adminAddAccount.js"></script>
		<!-- end -->
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
	<!-- add -->
		<form class="container-fluid" action="#" method="post" id="validateForm">
		<!-- end -->
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="accounttype">Account Type:</label>
	  					<select name="accountType" class="form-control" id="accounttype" onchange="enableCurriculumCourse()">
	    					<option value="Student">Student</option>
	    					<option value="Admin">Administrator</option>
	    					<option value="Registrar">Registrar</option>
	    					
	 					</select>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<label for="course">Course:</label>
	  					<select name="course" class="form-control" id="course" onchange="showOptions(this.value, showCurriculum, 'getCurriculum.php')">
	  						<option value=" ">Select Student's Course
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
	  						</option>
	 					</select>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<label for="curriculum">Curriculum:</label>
	  					<select name="curriculum" class="form-control" id="curriculum">
	  						<option value=" ">Select Curriculum</option>
	 					</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="fname">First Name:</label>
						<input type="text" class="form-control" id="fname" name="firstname" placeholder="First Name" onkeyup="lettersOnly(this)">
						</input>
					</div>
				</div>
				
				<div class="col-sm-4">
					<div class="form-group">
						<label for="Mname">Middle Name:</label>
						<input type="text" class="form-control" id="Mname" name="middlename" placeholder="Middle Name" onkeyup="lettersOnly(this)">
						</input>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<label for="lname">Last Name:</label>
						<input type="text" class="form-control" id="lname" name="lastname" placeholder="Last Name" onkeyup="lettersOnly(this)">
						</input>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="mobilenumber">Mobile Number:</label>
						<input type="text" id="mobNum" name="mobilenumber" placeholder="Enter 10 digit no. (9123456789)" 
						class="form-control bfh-phone" type="text" onkeyup="numbersOnly(this)"></input>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						<label for="email">E-Mail Address:</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail"></input>
					</div>
				</div>

				<div class="col-sm-4">
				    <div class="form-group has-feedback">
				         <label for="pass1">Password</label>
				         <input class="form-control" id="pass1" type="password" placeholder="Password" name="password" data-minLength="5"
				             data-error="some error" required/>
				    </div>

				    <div class"form-group">
				            <label for="pass2">Confirm Password</label>
				            <input class="form-control {$borderColor}" id="pass2" type="password" placeholder="Confirm password" name="confirmPassword" data-match="#confirmPassword" data-minLength="5" data-match-error="some error 2" required/>
				    </div>
				</div>
			</div>


			<div class="row">
			<div class = "col-sm-12">
			<h1></h1>
				<div class="pull-right">
					<button class="btn btn-success" button type="submit" class="btn btn-warning">Add Account</button>
	  				<button type="button" class="btn btn-default">Clear All</button>
				</div>
			</div>
			</div>
		</form>

		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

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
	</script>
</html>