<?php
	session_start();
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Profile </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="registrarProfile.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>

	<body>

		<div class="header">

			<ul style="padding-right: 0px;">

				<li>Profile</li>
				<li><a href="registrarCurriculumPage.php">Curriculum</a></li>
				<li><a href="registrarStudentPage.php">Student</a></li>
				<li><a href="registrarSubjectPage.php">Subject</a></li>
				<li>SIGN OUT</li>

			</ul>

			<img src="Quadrant1\logo.png">

		</div>

		<div class="infobodyheader">

			<h1>Welcome!, <?php echo $_SESSION['name'];?> </h1>
			
		</div>

		<div class="infobodyheader2">

			<h1>Personal Information</h1>

		</div>

		<div class="infobody">
			<div class="col-sm-12">
			<table class="table-condensed">
				<tr>
					<th>Name</th>
					<td><?php echo $_SESSION['fullname'];?></td>
				</tr>

				<tr>
					<th>Phone Number</th>
					<td><?php echo $_SESSION['phone'];?></td>
				</tr>

				<tr>
					<th>E-mail Address</th>
					<td><?php echo $_SESSION['email'];?></td>
				</tr>
			</table>
			</div>

		</div>

	</body>

</html>